using Microsoft.AspNetCore.Mvc;
using FOLLOWCAR_API_TEAM.Models;
using FOLLOWCAR_API_TEAM.Services;

namespace FOLLOWCAR_API_TEAM.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class CotizacionesController : ControllerBase
    {
        private readonly IGenericService<Cotizacion> _service;

        public CotizacionesController(IGenericService<Cotizacion> service)
        {
            _service = service;
        }

        [HttpGet]
        public async Task<ActionResult<IEnumerable<Cotizacion>>> GetCotizaciones()
        {
            var items = await _service.GetAllAsync();
            return Ok(items);
        }

        [HttpGet("{id}")]
        public async Task<ActionResult<Cotizacion>> GetCotizacion(int id)
        {
            var item = await _service.GetByIdAsync(id);
            if (item == null)
            {
                return NotFound();
            }
            return Ok(item);
        }

        [HttpPost]
        public async Task<ActionResult<Cotizacion>> PostCotizacion(Cotizacion item)
        {
            await _service.AddAsync(item);
            return CreatedAtAction(nameof(GetCotizacion), new { id = item.Id }, item);
        }

        [HttpPut("{id}")]
        public async Task<IActionResult> PutCotizacion(int id, Cotizacion item)
        {
            if (id != item.Id)
            {
                return BadRequest();
            }

            await _service.UpdateAsync(item);
            return NoContent();
        }

        [HttpDelete("{id}")]
        public async Task<IActionResult> DeleteCotizacion(int id)
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