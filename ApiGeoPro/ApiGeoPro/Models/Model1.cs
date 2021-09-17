using System;
using System.ComponentModel.DataAnnotations.Schema;
using System.Data.Entity;
using System.Linq;

namespace ApiGeoPro.Models
{
    public partial class Model1 : DbContext
    {
        public Model1()
            : base("name=Model1")
        {
        }

        public virtual DbSet<Estado> Estado { get; set; }
        public virtual DbSet<Georreferencias> Georreferencias { get; set; }
        public virtual DbSet<Permisos> Permisos { get; set; }
        public virtual DbSet<Usuario> Usuario { get; set; }

        protected override void OnModelCreating(DbModelBuilder modelBuilder)
        {
            modelBuilder.Entity<Estado>()
                .Property(e => e.Abreviatura)
                .IsUnicode(false);

            modelBuilder.Entity<Georreferencias>()
                .Property(e => e.Latitud)
                .IsUnicode(false);

            modelBuilder.Entity<Georreferencias>()
                .Property(e => e.Longitud)
                .IsUnicode(false);

            modelBuilder.Entity<Usuario>()
                .Property(e => e.RFC)
                .IsUnicode(false);
        }
    }
}
