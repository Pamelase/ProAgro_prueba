namespace ApiGeoPro.Models
{
    using System;
    using System.Collections.Generic;
    using System.ComponentModel.DataAnnotations;
    using System.ComponentModel.DataAnnotations.Schema;
    using System.Data.Entity.Spatial;

    public partial class Permisos
    {
        [Key]
        public int idPermiso { get; set; }

        public int idUsuario { get; set; }

        public int idEstado { get; set; }
    }
}
