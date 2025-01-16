using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace FOLLOWCAR_API_TEAM.Models
{
    public class MecanicoEspecialidad
    {
        [Key]
        public int Id { get; set; }

        [Required(ErrorMessage = "El ID del mecánico es requerido")]
        public int MecanicoId { get; set; }

        [Required(ErrorMessage = "El ID de la especialidad es requerido")]
        public int EspecialidadId { get; set; }

        [Required(ErrorMessage = "El nivel de experiencia es requerido")]
        [Range(1, 5, ErrorMessage = "El nivel de experiencia debe estar entre 1 y 5")]
        public int NivelExperiencia { get; set; }

        public DateTime? FechaCertificacion { get; set; }

        public string? NumeroCertificado { get; set; }

        public DateTime CreatedAt { get; set; } = DateTime.UtcNow;

        [ForeignKey("MecanicoId")]
        public virtual Usuario Mecanico { get; set; }

        [ForeignKey("EspecialidadId")]
        public virtual Especialidad Especialidad { get; set; }
    }
}