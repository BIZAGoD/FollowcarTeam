using Microsoft.AspNetCore.Mvc;
using FOLLOWCAR_API_TEAM.Models;
using FOLLOWCAR_API_TEAM.Services;

namespace FOLLOWCAR_API_TEAM.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class CategoriasInventarioController : ControllerBase
    {
        private readonly IGenericService<CategoriaInventario> _categoriaInventarioService;

        public CategoriasInventarioController(IGenericService<CategoriaInventario> categoriaInventarioService)
        {
            _categoriaInventarioService = categoriaInventarioService;
        }

        [HttpGet]
        public async Task<ActionResult<IEnumerable<CategoriaInventario>>> GetCategoriasInventario()
        {
            var categoriasInventario = await _categoriaInventarioService.GetAllAsync();
            return Ok(categoriasInventario);
        }

        [HttpGet("{id}")]
        public async Task<ActionResult<CategoriaInventario>> GetCategoriaInventario(int id)
        {
            var categoriaInventario = await _categoriaInventarioService.GetByIdAsync(id);
            if (categoriaInventario == null)
            {
                return NotFound();
            }
            return Ok(categoriaInventario);
        }

        [HttpPost]
        public async Task<ActionResult<CategoriaInventario>> PostCategoriaInventario(CategoriaInventario categoriaInventario)
        {
            var createdCategoriaInventario = await _categoriaInventarioService.AddAsync(categoriaInventario);
            return CreatedAtAction(nameof(GetCategoriaInventario), new { id = createdCategoriaInventario.Id }, createdCategoriaInventario);
        }

        [HttpPut("{id}")]
        public async Task<IActionResult> PutCategoriaInventario(int id, CategoriaInventario categoriaInventario)
        {
            if (id != categoriaInventario.Id)
            {
                return BadRequest();
            }

            await _categoriaInventarioService.UpdateAsync(categoriaInventario);
            return NoContent();
        }

        [HttpDelete("{id}")]
        public async Task<IActionResult> DeleteCategoriaInventario(int id)
        {
            var result = await _categoriaInventarioService.DeleteAsync(id);
            if (!result)
            {
                return NotFound();
            }
            return NoContent();
        }
    }
}