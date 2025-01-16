using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace FOLLOWCAR_API_TEAM.Models
{
    public class Vehiculo
    {
        [Key]
        public int Id { get; set; }

        [Required(ErrorMessage = "El ID del propietario es requerido")]
        public int PropietarioId { get; set; }

        [Required(ErrorMessage = "La marca es requerida")]
        [StringLength(50, ErrorMessage = "La marca no puede tener más de 50 caracteres")]
        public string Marca { get; set; }

        [Required(ErrorMessage = "El modelo es requerido")]
        [StringLength(50, ErrorMessage = "El modelo no puede tener más de 50 caracteres")]
        public string Modelo { get; set; }

        [Required(ErrorMessage = "El año es requerido")]
        [Range(1900, 2100, ErrorMessage = "El año debe estar entre 1900 y 2100")]
        public int Anio { get; set; }

        [Required(ErrorMessage = "El número de placa es requerido")]
        [StringLength(20, ErrorMessage = "El número de placa no puede tener más de 20 caracteres")]
        public string NumeroPlaca { get; set; }

        [Required(ErrorMessage = "El VIN es requerido")]
        [StringLength(17, MinimumLength = 17, ErrorMessage = "El VIN debe tener exactamente 17 caracteres")]
        public string VIN { get; set; }

        [StringLength(50, ErrorMessage = "El color no puede tener más de 50 caracteres")]
        public string? Color { get; set; }

        public string? Tipo { get; set; }

        public string? Transmision { get; set; }

        public string? Combustible { get; set; }

        public int? Kilometraje { get; set; }

        [StringLength(255, ErrorMessage = "La URL de la foto no puede tener más de 255 caracteres")]
        public string? FotoUrl { get; set; }

        [Required(ErrorMessage = "El estado del vehículo es requerido")]
        [StringLength(20, ErrorMessage = "El estado no puede tener más de 20 caracteres")]
        public string Estado { get; set; } = "activo";

        public DateTime CreatedAt { get; set; } = DateTime.UtcNow;

        public DateTime UpdatedAt { get; set; } = DateTime.UtcNow;

        [ForeignKey("PropietarioId")]
        public virtual Usuario Propietario { get; set; }
    }
}