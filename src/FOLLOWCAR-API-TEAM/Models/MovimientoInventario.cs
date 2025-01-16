using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace FOLLOWCAR_API_TEAM.Models
{
    public class MovimientoInventario
    {
        [Key]
        public int Id { get; set; }

        [Required(ErrorMessage = "El ID del artículo es requerido")]
        public int ArticuloId { get; set; }

        [Required(ErrorMessage = "El tipo de movimiento es requerido")]
        [StringLength(20, ErrorMessage = "El tipo de movimiento no puede tener más de 20 caracteres")]
        public string TipoMovimiento { get; set; }

        [Required(ErrorMessage = "La cantidad es requerida")]
        [Range(1, int.MaxValue, ErrorMessage = "La cantidad debe ser un número positivo")]
        public int Cantidad { get; set; }

        public int? UsuarioId { get; set; }

        public int? CitaId { get; set; }

        [Required(ErrorMessage = "La fecha del movimiento es requerida")]
        public DateTime FechaMovimiento { get; set; } = DateTime.UtcNow;

        public string? Motivo { get; set; }

        [ForeignKey("ArticuloId")]
        public virtual Inventario Articulo { get; set; }

        [ForeignKey("UsuarioId")]
        public virtual Usuario? Usuario { get; set; }

        [ForeignKey("CitaId")]
        public virtual Cita? Cita { get; set; }
    }
}