using System.ComponentModel.DataAnnotations;

namespace FOLLOWCAR_API_TEAM.Models
{
    public class Especialidad
    {
        [Key]
        public int Id { get; set; }

        [Required(ErrorMessage = "El nombre de la especialidad es requerido")]
        [StringLength(100, ErrorMessage ="El nombre de la especialidad no puede tener más de 100 caracteres")]
        public string Nombre { get; set; }

        public string? Descripcion { get; set; }

        public DateTime CreatedAt { get; set; } = DateTime.UtcNow;
    }
}