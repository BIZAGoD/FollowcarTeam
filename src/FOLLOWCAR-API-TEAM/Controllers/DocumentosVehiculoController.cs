using Microsoft.AspNetCore.Mvc;
using FOLLOWCAR_API_TEAM.Models;
using FOLLOWCAR_API_TEAM.Services;

namespace FOLLOWCAR_API_TEAM.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class DocumentosVehiculoController : ControllerBase
    {
        private readonly IGenericService<DocumentoVehiculo> _service;

        public DocumentosVehiculoController(IGenericService<DocumentoVehiculo> service)
        {
            _service = service;
        }

        [HttpGet]
        public async Task<ActionResult<IEnumerable<DocumentoVehiculo>>> GetDocumentosVehiculo()
        {
            var items = await _service.GetAllAsync();
            return Ok(items);
        }

        [HttpGet("{id}")]
        public async Task<ActionResult<DocumentoVehiculo>> GetDocumentoVehiculo(int id)
        {
            var item = await _service.GetByIdAsync(id);
            if (item == null)
            {
                return NotFound();
            }
            return Ok(item);
        }

        [HttpPost]
        public async Task<ActionResult<DocumentoVehiculo>> PostDocumentoVehiculo(DocumentoVehiculo item)
        {
            await _service.AddAsync(item);
            return CreatedAtAction(nameof(GetDocumentoVehiculo), new { id = item.Id }, item);
        }

        [HttpPut("{id}")]
        public async Task<IActionResult> PutDocumentoVehiculo(int id, DocumentoVehiculo item)
        {
            if (id != item.Id)
            {
                return BadRequest();
            }

            await _service.UpdateAsync(item);
            return NoContent();
        }

        [HttpDelete("{id}")]
        public async Task<IActionResult> DeleteDocumentoVehiculo(int id)
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