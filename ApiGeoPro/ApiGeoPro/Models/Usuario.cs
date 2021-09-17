namespace ApiGeoPro.Models
{
    using System;
    using System.Collections.Generic;
    using System.ComponentModel.DataAnnotations;
    using System.ComponentModel.DataAnnotations.Schema;
    using System.Data.Entity.Spatial;

    [Table("Usuario")]
    public partial class Usuario
    {
        [Key]
        public int idUsuario { get; set; }

        [Required]
        [StringLength(10)]
        public string Contrasena { get; set; }

        [StringLength(70)]
        public string Nombre { get; set; }

        public DateTime Fecha_nacimiento_creacion { get; set; }

        [StringLength(15)]
        public string RFC { get; set; }
    }
}
