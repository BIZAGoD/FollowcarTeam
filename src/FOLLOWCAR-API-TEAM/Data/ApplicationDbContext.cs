using Microsoft.EntityFrameworkCore;
using FOLLOWCAR_API_TEAM.Models;

namespace FOLLOWCAR_API_TEAM.Data
{
    public class ApplicationDbContext : DbContext
    {
        public ApplicationDbContext(DbContextOptions<ApplicationDbContext> options)
            : base(options)
        {
        }

        public DbSet<Usuario> Usuarios { get; set; }
        public DbSet<Rol> Roles { get; set; }
        public DbSet<CategoriaInventario> CategoriasInventario { get; set; }
        public DbSet<CategoriaServicio> CategoriasServicio { get; set; }
        public DbSet<Cita> Citas { get; set; }
        public DbSet<Cotizacion> Cotizaciones { get; set; }
        public DbSet<DetalleCotizacion> DetallesCotizacion { get; set; }
        public DbSet<Diagnostico> Diagnosticos { get; set; }
        public DbSet<DocumentoVehiculo> DocumentosVehiculo { get; set; }
        public DbSet<Especialidad> Especialidades { get; set; }
        public DbSet<Factura> Facturas { get; set; }
        public DbSet<Inventario> Inventarios { get; set; }
        public DbSet<MecanicoEspecialidad> MecanicoEspecialidades { get; set; }
        public DbSet<Mensaje> Mensajes { get; set; }
        public DbSet<MovimientoInventario> MovimientosInventario { get; set; }
        public DbSet<Notificacion> Notificaciones { get; set; }
        public DbSet<Pago> Pagos { get; set; }
        public DbSet<TipoServicio> TiposServicio { get; set; }
        public DbSet<Vehiculo> Vehiculos { get; set; }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            base.OnModelCreating(modelBuilder);

            modelBuilder.Entity<Usuario>()
                .HasOne(u => u.Rol)
                .WithMany()
                .HasForeignKey(u => u.RolId)
                .OnDelete(DeleteBehavior.Restrict);

            modelBuilder.Entity<Cita>()
                .HasOne(c => c.Cliente)
                .WithMany()
                .HasForeignKey(c => c.ClienteId)
                .OnDelete(DeleteBehavior.Restrict);

            modelBuilder.Entity<Cita>()
                .HasOne(c => c.Mecanico)
                .WithMany()
                .HasForeignKey(c => c.MecanicoId)
                .OnDelete(DeleteBehavior.Restrict);

        }
    }
}