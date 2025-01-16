using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace FOLLOWCAR_API_TEAM.Models
{
    public class Pago
    {
        [Key]
        public int Id { get; set; }

        [Required(ErrorMessage = "El ID de la factura es requerido")]
        public int FacturaId { get; set; }

        [Required(ErrorMessage = "El monto es requerido")]
        [Range(0.01, double.MaxValue, ErrorMessage = "El monto debe ser mayor que cero")]
        [Column(TypeName = "decimal(10, 2)")]
        public decimal Monto { get; set; }

        [Required(ErrorMessage = "La fecha de pago es requerida")]
        public DateTime FechaPago { get; set; }

        [Required(ErrorMessage = "El método de pago es requerido")]
        [StringLength(50, ErrorMessage = "El método de pago no puede tener más de 50 caracteres")]
        public string MetodoPago { get; set; }

        [StringLength(100, ErrorMessage = "El número de referencia no puede tener más de 100 caracteres")]
        public string? NumeroReferencia { get; set; }

        [Required(ErrorMessage = "El estado del pago es requerido")]
        [StringLength(20, ErrorMessage = "El estado no puede tener más de 20 caracteres")]
        public string Estado { get; set; } = "procesado";

        public string? Notas { get; set; }

        [ForeignKey("FacturaId")]
        public virtual Factura Factura { get; set; }
    }
}