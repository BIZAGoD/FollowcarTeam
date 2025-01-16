using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace FOLLOWCAR_API_TEAM.Models
{
    public class DetalleCotizacion
    {
        [Key]
        public int Id { get; set; }

        [Required(ErrorMessage = "El ID de la cotización es requerido")]
        public int CotizacionId { get; set; }

        [Required(ErrorMessage = "El tipo de detalle es requerido")]
        [StringLength(10, ErrorMessage = "El tipo no puede tener más de 10 caracteres")]
        public string Tipo { get; set; }

        public int? PiezaId { get; set; }

        public int? ServicioId { get; set; }

        [Required(ErrorMessage = "La descripción es requerida")]
        [StringLength(255, ErrorMessage = "La descripción no puede tener más de 255 caracteres")]
        public string Descripcion { get; set; }

        [Required(ErrorMessage = "La cantidad es requerida")]
        [Range(1, int.MaxValue, ErrorMessage = "La cantidad debe ser un número positivo")]
        public int Cantidad { get; set; }

        [Required(ErrorMessage = "El precio unitario es requerido")]
        [Range(0, double.MaxValue, ErrorMessage = "El precio unitario debe ser un valor positivo")]
        [Column(TypeName = "decimal(10, 2)")]
        public decimal PrecioUnitario { get; set; }

        [Required(ErrorMessage = "El subtotal es requerido")]
        [Range(0, double.MaxValue, ErrorMessage = "El subtotal debe ser un valor positivo")]
        [Column(TypeName = "decimal(10, 2)")]
        public decimal Subtotal { get; set; }

        public string? Notas { get; set; }

        public DateTime CreatedAt { get; set; } = DateTime.UtcNow;

        [ForeignKey("CotizacionId")]
        public virtual Cotizacion Cotizacion { get; set; }

        [ForeignKey("PiezaId")]
        public virtual Inventario? Pieza { get; set; }

        [ForeignKey("ServicioId")]
        public virtual TipoServicio? Servicio { get; set; }
    }
}