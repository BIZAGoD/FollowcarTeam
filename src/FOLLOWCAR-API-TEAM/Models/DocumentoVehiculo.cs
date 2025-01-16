using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace FOLLOWCAR_API_TEAM.Models
{
    public class DocumentoVehiculo
    {
        [Key]
        public int Id { get; set; }

        [Required(ErrorMessage = "El ID del vehículo es requerido")]
        public int VehiculoId { get; set; }

        [Required(ErrorMessage = "El tipo de documento es requerido")]
        [StringLength(20, ErrorMessage = "El tipo no puede tener más de 20 caracteres")]
        public string Tipo { get; set; }

        [Required(ErrorMessage = "La URL del archivo es requerida")]
        [StringLength(255, ErrorMessage = "La URL del archivo no puede tener más de 255 caracteres")]
        public string ArchivoUrl { get; set; }

        public DateTime? FechaVencimiento { get; set; }

        public DateTime CreatedAt { get; set; } = DateTime.UtcNow;

        [ForeignKey("VehiculoId")]
        public virtual Vehiculo Vehiculo { get; set; }
    }
}