using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace FOLLOWCAR_API_TEAM.Models
{
    public class Cita
    {
        [Key]
        public int Id { get; set; }

        [Required(ErrorMessage = "El ID del cliente es requerido")]
        public int ClienteId { get; set; }

        [Required(ErrorMessage = "El ID del vehículo es requerido")]
        public int VehiculoId { get; set; }

        [Required(ErrorMessage = "El ID del tipo de servicio es requerido")]
        public int TipoServicioId { get; set; }

        public int? MecanicoId { get; set; }

        [Required(ErrorMessage = "La fecha y hora de la cita son requeridas")]
        public DateTime FechaHora { get; set; }

        [Required(ErrorMessage = "El estado de la cita es requerido")]
        [StringLength(50, ErrorMessage = "El estado no puede tener más de 50 caracteres")]
        public string Estado { get; set; } = "pendiente";

        public string? MotivoCancelacion { get; set; }

        public string? ObservacionesCliente { get; set; }

        public string? ObservacionesInternas { get; set; }

        [StringLength(10, ErrorMessage = "La prioridad no puede tener más de 10 caracteres")]
        public string Prioridad { get; set; } = "media";

        public DateTime CreatedAt { get; set; } = DateTime.UtcNow;

        public DateTime UpdatedAt { get; set; } = DateTime.UtcNow;

        [ForeignKey("ClienteId")]
        public virtual Usuario Cliente { get; set; }

        [ForeignKey("VehiculoId")]
        public virtual Vehiculo Vehiculo { get; set; }

        [ForeignKey("TipoServicioId")]
        public virtual TipoServicio TipoServicio { get; set; }

        [ForeignKey("MecanicoId")]
        public virtual Usuario? Mecanico { get; set; }
    }
}