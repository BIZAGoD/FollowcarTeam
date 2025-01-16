using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace FOLLOWCAR_API_TEAM.Models
{
    public class Notificacion
    {
        [Key]
        public int Id { get; set; }

        [Required(ErrorMessage = "El ID del usuario es requerido")]
        public int UsuarioId { get; set; }

        [Required(ErrorMessage = "El tipo de notificación es requerido")]
        [StringLength(50, ErrorMessage = "El tipo de notificación no puede tener más de 50 caracteres")]
        public string Tipo { get; set; }

        [Required(ErrorMessage = "El contenido de la notificación es requerido")]
        public string Contenido { get; set; }

        public DateTime FechaEnvio { get; set; } = DateTime.UtcNow;

        public DateTime? FechaLectura { get; set; }

        [Required(ErrorMessage = "El estado de la notificación es requerido")]
        [StringLength(20, ErrorMessage = "El estado no puede tener más de 20 caracteres")]
        public string Estado { get; set; } = "no_leida";

        [ForeignKey("UsuarioId")]
        public virtual Usuario Usuario { get; set; }
    }
}