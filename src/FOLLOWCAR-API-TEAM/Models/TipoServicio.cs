using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace FOLLOWCAR_API_TEAM.Models
{
    public class TipoServicio
    {
        [Key]
        public int Id { get; set; }

        [Required(ErrorMessage = "El ID de la categoría es requerido")]
        public int CategoriaId { get; set; }

        [Required(ErrorMessage = "El nombre del servicio es requerido")]
        [StringLength(100, ErrorMessage = "El nombre no puede tener más de 100 caracteres")]
        public string Nombre { get; set; }

        [Required(ErrorMessage = "La descripción es requerida")]
        public string Descripcion { get; set; }

        [Required(ErrorMessage = "El precio es requerido")]
        [Range(0, double.MaxValue, ErrorMessage = "El precio debe ser un valor no negativo")]
        [Column(TypeName = "decimal(10, 2)")]
        public decimal Precio { get; set; }

        [Required(ErrorMessage = "La duración estimada es requerida")]
        [Range(1, int.MaxValue, ErrorMessage = "La duración estimada debe ser un número positivo")]
        public int DuracionEstimada { get; set; }

        [StringLength(255, ErrorMessage = "La URL del icono no puede tener más de 255 caracteres")]
        public string? IconoUrl { get; set; }

        [Required(ErrorMessage = "El estado del servicio es requerido")]
        [StringLength(20, ErrorMessage = "El estado no puede tener más de 20 caracteres")]
        public string Estado { get; set; } = "activo";

        public DateTime CreatedAt { get; set; } = DateTime.UtcNow;

        public DateTime UpdatedAt { get; set; } = DateTime.UtcNow;

        [ForeignKey("CategoriaId")]
        public virtual CategoriaServicio Categoria { get; set; }
    }
}