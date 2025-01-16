using Microsoft.AspNetCore.Mvc;
using FOLLOWCAR_API_TEAM.Models;
using FOLLOWCAR_API_TEAM.Services;

namespace FOLLOWCAR_API_TEAM.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class MecanicoEspecialidadController : ControllerBase
    {
        private readonly IGenericService<MecanicoEspecialidad> _service;

        public MecanicoEspecialidadController(IGenericService<MecanicoEspecialidad> service)
        {
            _service = service;
        }

        [HttpGet]
        public async Task<ActionResult<IEnumerable<MecanicoEspecialidad>>> GetMecanicoEspecialidades()
        {
            var items = await _service.GetAllAsync();
            return Ok(items);
        }

        [HttpGet("{mecanicoId}/{especialidadId}")]
        public async Task<ActionResult<MecanicoEspecialidad>> GetMecanicoEspecialidad(int mecanicoId, int especialidadId)
        {
            var items = await _service.GetAllAsync();
            var item = items.FirstOrDefault(me => me.MecanicoId == mecanicoId && me.EspecialidadId == especialidadId);
            
            if (item == null)
            {
                return NotFound();
            }
            return Ok(item);
        }

        [HttpPost]
        public async Task<ActionResult<MecanicoEspecialidad>> PostMecanicoEspecialidad(MecanicoEspecialidad item)
        {
            await _service.AddAsync(item);
            return CreatedAtAction(nameof(GetMecanicoEspecialidad), 
                new { mecanicoId = item.MecanicoId, especialidadId = item.EspecialidadId }, item);
        }

        [HttpDelete("{mecanicoId}/{especialidadId}")]
        public async Task<IActionResult> DeleteMecanicoEspecialidad(int mecanicoId, int especialidadId)
        {
            var items = await _service.GetAllAsync();
            var item = items.FirstOrDefault(me => me.MecanicoId == mecanicoId && me.EspecialidadId == especialidadId);
            
            if (item == null)
            {
                return NotFound();
            }

            await _service.DeleteAsync(item.Id);
            return NoContent();
        }
    }
}