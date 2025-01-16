using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace FOLLOWCAR_API_TEAM.Models
{
    public class Factura
    {
        [Key]
        public int Id { get; set; }

        [Required(ErrorMessage = "El ID de la cotización es requerido")]
        public int CotizacionId { get; set; }

        [Required(ErrorMessage = "El número de factura es requerido")]
        [StringLength(20, ErrorMessage = "El número de factura no puede tener más de 20 caracteres")]
        public string NumeroFactura { get; set; }

        [Required(ErrorMessage = "La fecha de emisión es requerida")]
        public DateTime FechaEmision { get; set; }

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

        [Required(ErrorMessage = "El método de pago es requerido")]
        [StringLength(20, ErrorMessage = "El método de pago no puede tener más de 20 caracteres")]
        public string MetodoPago { get; set; }

        [Required(ErrorMessage = "El estado de la factura es requerido")]
        [StringLength(20, ErrorMessage = "El estado no puede tener más de 20 caracteres")]
        public string Estado { get; set; } = "pendiente";

        public string? Notas { get; set; }

        public DateTime CreatedAt { get; set; } = DateTime.UtcNow;

        public DateTime UpdatedAt { get; set; } = DateTime.UtcNow;

        [ForeignKey("CotizacionId")]
        public virtual Cotizacion Cotizacion { get; set; }
    }
}