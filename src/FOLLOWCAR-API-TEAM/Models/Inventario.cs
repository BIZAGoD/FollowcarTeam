using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace FOLLOWCAR_API_TEAM.Models
{
    public class Inventario
    {
        [Key]
        public int Id { get; set; }

        [Required(ErrorMessage = "El ID de la categoría es requerido")]
        public int CategoriaId { get; set; }

        [Required(ErrorMessage = "El nombre del artículo es requerido")]
        [StringLength(100, ErrorMessage = "El nombre no puede tener más de 100 caracteres")]
        public string Nombre { get; set; }

        [Required(ErrorMessage = "La descripción es requerida")]
        public string Descripcion { get; set; }

        [Required(ErrorMessage = "El código SKU es requerido")]
        [StringLength(50, ErrorMessage = "El código SKU no puede tener más de 50 caracteres")]
        public string SKU { get; set; }

        [Required(ErrorMessage = "La cantidad es requerida")]
        [Range(0, int.MaxValue, ErrorMessage = "La cantidad debe ser un número no negativo")]
        public int Cantidad { get; set; }

        [Required(ErrorMessage = "El precio de compra es requerido")]
        [Range(0, double.MaxValue, ErrorMessage = "El precio de compra debe ser un valor no negativo")]
        [Column(TypeName = "decimal(10, 2)")]
        public decimal PrecioCompra { get; set; }

        [Required(ErrorMessage = "El precio de venta es requerido")]
        [Range(0, double.MaxValue, ErrorMessage = "El precio de venta debe ser un valor no negativo")]
        [Column(TypeName = "decimal(10, 2)")]
        public decimal PrecioVenta { get; set; }

        [Required(ErrorMessage = "El punto de reorden es requerido")]
        [Range(0, int.MaxValue, ErrorMessage = "El punto de reorden debe ser un número no negativo")]
        public int PuntoReorden { get; set; }

        [StringLength(255, ErrorMessage = "La URL de la imagen no puede tener más de 255 caracteres")]
        public string? ImagenUrl { get; set; }

        public string? Ubicacion { get; set; }

        [Required(ErrorMessage = "El estado del artículo es requerido")]
        [StringLength(20, ErrorMessage = "El estado no puede tener más de 20 caracteres")]
        public string Estado { get; set; } = "activo";

        public DateTime CreatedAt { get; set; } = DateTime.UtcNow;

        public DateTime UpdatedAt { get; set; } = DateTime.UtcNow;

        [ForeignKey("CategoriaId")]
        public virtual CategoriaInventario Categoria { get; set; }
    }
}