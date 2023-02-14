
var mysql = require('mysql');
// Consulta SQL.
var sql = 'SELECT * FROM empleados';

// Parámetros de conexión a la base de datos.
var con = mysql.createConnection({
  host: "192.168.1.133",
  user: "root",
  password: "",
  database : 'intercartonpruebas'
});

// Funcion que nos permite comprobar la conexión a la base de datos.
// con.connect(function(err) {
//   if (err) throw err;
//   console.log("Connected!");
// });

// Funcion que nos devolverá resultados de la base de datos.
con.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
  con.query(sql, function (err, result) {
    if (err) throw err;

    // Bucle que recore los resultados y pinta en consola.
    for(i=0; i<result.length; i++){
    	console.log("Result: " + result[i].name);
    }

  });
});
