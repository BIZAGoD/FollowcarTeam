using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace FOLLOWCAR_API_TEAM.Models
{
    public class Mensaje
    {
        [Key]
        public int Id { get; set; }

        [Required(ErrorMessage = "El ID del remitente es requerido")]
        public int RemitenteId { get; set; }

        [Required(ErrorMessage = "El ID del destinatario es requerido")]
        public int DestinatarioId { get; set; }

        [Required(ErrorMessage = "El contenido del mensaje es requerido")]
        public string Contenido { get; set; }

        public DateTime FechaEnvio { get; set; } = DateTime.UtcNow;

        public DateTime? FechaLectura { get; set; }

        [Required(ErrorMessage = "El estado del mensaje es requerido")]
        [StringLength(20, ErrorMessage = "El estado no puede tener más de 20 caracteres")]
        public string Estado { get; set; } = "enviado";

        [ForeignKey("RemitenteId")]
        public virtual Usuario Remitente { get; set; }

        [ForeignKey("DestinatarioId")]
        public virtual Usuario Destinatario { get; set; }
    }
}