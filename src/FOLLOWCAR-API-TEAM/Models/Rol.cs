using System.ComponentModel.DataAnnotations;

namespace FOLLOWCAR_API_TEAM.Models
{
    public class Rol
    {
        [Key]
        public int Id { get; set; }

        [Required(ErrorMessage = "El nombre del rol es requerido")]
        [StringLength(50, ErrorMessage = "El nombre del rol no puede tener más de 50 caracteres")]
        public string Nombre { get; set; }

        public string? Descripcion { get; set; }

        public DateTime CreatedAt { get; set; } = DateTime.UtcNow;
    }
}