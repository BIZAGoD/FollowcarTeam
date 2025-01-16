using Microsoft.AspNetCore.Mvc;
using FOLLOWCAR_API_TEAM.Models;
using FOLLOWCAR_API_TEAM.Services;

namespace FOLLOWCAR_API_TEAM.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class CategoriasServicioController : ControllerBase
    {
        private readonly IGenericService<CategoriaServicio> _categoriaServicioService;

        public CategoriasServicioController(IGenericService<CategoriaServicio> categoriaServicioService)
        {
            _categoriaServicioService = categoriaServicioService;
        }

        [HttpGet]
        public async Task<ActionResult<IEnumerable<CategoriaServicio>>> GetCategoriasServicio()
        {
            var categoriasServicio = await _categoriaServicioService.GetAllAsync();
            return Ok(categoriasServicio);
        }

        [HttpGet("{id}")]
        public async Task<ActionResult<CategoriaServicio>> GetCategoriaServicio(int id)
        {
            var categoriaServicio = await _categoriaServicioService.GetByIdAsync(id);
            if (categoriaServicio == null)
            {
                return NotFound();
            }
            return Ok(categoriaServicio);
        }

        [HttpPost]
        public async Task<ActionResult<CategoriaServicio>> PostCategoriaServicio(CategoriaServicio categoriaServicio)
        {
            var createdCategoriaServicio = await _categoriaServicioService.AddAsync(categoriaServicio);
            return CreatedAtAction(nameof(GetCategoriaServicio), new { id = createdCategoriaServicio.Id }, createdCategoriaServicio);
        }

        [HttpPut("{id}")]
        public async Task<IActionResult> PutCategoriaServicio(int id, CategoriaServicio categoriaServicio)
        {
            if (id != categoriaServicio.Id)
            {
                return BadRequest();
            }

            await _categoriaServicioService.UpdateAsync(categoriaServicio);
            return NoContent();
        }

        [HttpDelete("{id}")]
        public async Task<IActionResult> DeleteCategoriaServicio(int id)
        {
            var result = await _categoriaServicioService.DeleteAsync(id);
            if (!result)
            {
                return NotFound();
            }
            return NoContent();
        }
    }
}