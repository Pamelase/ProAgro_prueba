namespace ApiGeoPro.Models
{
    using System;
    using System.Collections.Generic;
    using System.ComponentModel.DataAnnotations;
    using System.ComponentModel.DataAnnotations.Schema;
    using System.Data.Entity.Spatial;

    public partial class Georreferencias
    {
        [Key]
        public int idGeorreferencia { get; set; }

        public int idEstado { get; set; }

        [Required]
        [StringLength(25)]
        public string Latitud { get; set; }

        [Required]
        [StringLength(25)]
        public string Longitud { get; set; }
    }
}
