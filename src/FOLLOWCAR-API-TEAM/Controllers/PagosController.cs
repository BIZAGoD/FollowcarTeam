using Microsoft.AspNetCore.Mvc;
using FOLLOWCAR_API_TEAM.Models;
using FOLLOWCAR_API_TEAM.Services;

namespace FOLLOWCAR_API_TEAM.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class PagosController : ControllerBase
    {
        private readonly IGenericService<Pago> _service;

        public PagosController(IGenericService<Pago> service)
        {
            _service = service;
        }

        [HttpGet]
        public async Task<ActionResult<IEnumerable<Pago>>> GetPagos()
        {
            var items = await _service.GetAllAsync();
            return Ok(items);
        }

        [HttpGet("{id}")]
        public async Task<ActionResult<Pago>> GetPago(int id)
        {
            var item = await _service.GetByIdAsync(id);
            if (item == null)
            {
                return NotFound();
            }
            return Ok(item);
        }

        [HttpPost]
        public async Task<ActionResult<Pago>> PostPago(Pago item)
        {
            await _service.AddAsync(item);
            return CreatedAtAction(nameof(GetPago), new { id = item.Id }, item);
        }

        [HttpPut("{id}")]
        public async Task<IActionResult> PutPago(int id, Pago item)
        {
            if (id != item.Id)
            {
                return BadRequest();
            }

            await _service.UpdateAsync(item);
            return NoContent();
        }

        [HttpDelete("{id}")]
        public async Task<IActionResult> DeletePago(int id)
        {
            var item = await _service.GetByIdAsync(id);
            if (item == null)
            {
                return NotFound();
            }

            await _service.DeleteAsync(id);
            return NoContent();
        }
    }
}