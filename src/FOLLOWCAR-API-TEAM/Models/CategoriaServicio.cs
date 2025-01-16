using System.ComponentModel.DataAnnotations;

namespace FOLLOWCAR_API_TEAM.Models
{
    public class CategoriaServicio
    {
        [Key]
        public int Id { get; set; }

        [Required(ErrorMessage = "El nombre de la categoría es requerido")]
        [StringLength(100, ErrorMessage = "El nombre de la categoría no puede tener más de 100 caracteres")]
        public string Nombre { get; set; }

        public string? Descripcion { get; set; }

        [StringLength(50, ErrorMessage = "El icono no puede tener más de 50 caracteres")]
        public string? Icono { get; set; }

        public DateTime CreatedAt { get; set; } = DateTime.UtcNow;
    }
}