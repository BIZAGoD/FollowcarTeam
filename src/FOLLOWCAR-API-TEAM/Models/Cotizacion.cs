using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace FOLLOWCAR_API_TEAM.Models
{
    public class Cotizacion
    {
        [Key]
        public int Id { get; set; }

        [Required(ErrorMessage = "El ID del diagnóstico es requerido")]
        public int DiagnosticoId { get; set; }

        [Required(ErrorMessage = "El número de cotización es requerido")]
        [StringLength(20, ErrorMessage = "El número de cotización no puede tener más de 20 caracteres")]
        public string NumeroCotizacion { get; set; }

        [Required(ErrorMessage = "El subtotal es requerido")]
        [Range(0, double.MaxValue, ErrorMessage = "El subtotal debe ser un valor positivo")]
        [Column(TypeName = "decimal(10, 2)")]
        public decimal Subtotal { get; set; }

        [Required(ErrorMessage = "El IVA es requerido")]
        [Range(0, double.MaxValue, ErrorMessage = "El IVA debe ser un valor positivo")]
        [Column(TypeName = "decimal(10, 2)")]
        public decimal IVA { get; set; }

        [Required(ErrorMessage = "El total es requerido")]
        [Range(0, double.MaxValue, ErrorMessage = "El total debe ser un valor positivo")]
        [Column(TypeName = "decimal(10, 2)")]
        public decimal Total { get; set; }

        [Required(ErrorMessage = "El estado de la cotización es requerido")]
        [StringLength(20, ErrorMessage = "El estado no puede tener más de 20 caracteres")]
        public string Estado { get; set; } = "pendiente";

        public string? MotivoRechazo { get; set; }

        public DateTime? FechaAprobacion { get; set; }

        [Required(ErrorMessage = "La fecha de expiración es requerida")]
        public DateTime FechaExpiracion { get; set; }

        public DateTime CreatedAt { get; set; } = DateTime.UtcNow;

        public DateTime UpdatedAt { get; set; } = DateTime.UtcNow;

        [ForeignKey("DiagnosticoId")]
        public virtual Diagnostico Diagnostico { get; set; }
    }
}