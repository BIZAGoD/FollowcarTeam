using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace FOLLOWCAR_API_TEAM.Models
{
    public class Diagnostico
    {
        [Key]
        public int Id { get; set; }

        [Required(ErrorMessage = "El ID de la cita es requerido")]
        public int CitaId { get; set; }

        [Required(ErrorMessage = "El ID del mecánico es requerido")]
        public int MecanicoId { get; set; }

        [Required(ErrorMessage = "El estado del diagnóstico es requerido")]
        [StringLength(20, ErrorMessage = "El estado no puede tener más de 20 caracteres")]
        public string Estado { get; set; } = "pendiente";

        [Required(ErrorMessage = "La descripción del problema es requerida")]
        public string DescripcionProblema { get; set; }

        public string? DiagnosticoDetallado { get; set; }

        public string? Recomendaciones { get; set; }

        public DateTime? FechaInicio { get; set; }

        public DateTime? FechaFin { get; set; }

        public string? FotosEvidencia { get; set; }

        public DateTime CreatedAt { get; set; } = DateTime.UtcNow;

        public DateTime UpdatedAt { get; set; } = DateTime.UtcNow;

        [ForeignKey("CitaId")]
        public virtual Cita Cita { get; set; }

        [ForeignKey("MecanicoId")]
        public virtual Usuario Mecanico { get; set; }
    }
}