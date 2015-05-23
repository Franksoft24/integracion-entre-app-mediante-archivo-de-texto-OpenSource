package crear.archivo.de.texto;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.ResultSet;
import java.io.*;
import java.util.logging.Level;
import java.util.logging.Logger;

public class CrearArchivoDeTexto {

    private static final String JDBC_DRIVER = "com.mysql.jdbc.Driver";
    private static final String DB_URL = "jdbc:mysql://localhost:3307/fundapec";
    private static final String USER = "root";
    private static final String PASS = "root";
    
    public static Connection getConectionDB(){
        try {
            Class.forName(JDBC_DRIVER);
        } catch (ClassNotFoundException ex) {
            System.out.println("No se pudo cargar el driver de la base de datos.");
            return null;
        }
        Connection con = null;
        try {
            con = DriverManager.getConnection(DB_URL,USER,PASS);
        } catch (SQLException ex) {
            System.out.println("Conexion fallida a la base de datos.");
            ex.printStackTrace();
        }
        return con;
    }
    
    private CrearArchivoDeTexto(){
    }
    
    public static void main(String[] args) throws IOException {
       String Nombre;
       String Apellido;
       int Matricula;
       float Monto;
       String concatenar;
       File Estudiantes = new File("C:\\servidores\\XAMPP\\htdocs\\LeerTXT\\archivo\\estudiante.txt");
       BufferedWriter escribir = new BufferedWriter(new FileWriter(Estudiantes));
       Connection con = CrearArchivoDeTexto.getConectionDB();
       String query = "SELECT * FROM fundapec.estudiante";
        try {
            ResultSet rs = con.prepareStatement(query).executeQuery();
            escribir.write("");
            while(rs.next()){
                Nombre = rs.getString("Nombre");
                Apellido = rs.getString("Apellido");
                Matricula = rs.getInt("Matricula");
                Monto = rs.getFloat("Monto");
                concatenar = Nombre+","+Apellido+","+Matricula+","+Monto;
                escribir.append("\n"+concatenar);
            }
            
        } catch (SQLException ex) {
            Logger.getLogger(CrearArchivoDeTexto.class.getName()).log(Level.SEVERE, null, ex);
        }
        escribir.close();
        System.out.println("\n\n\tWiiiiiiiiii, se ha generado el archivo de texto.\n");
        System.out.println("Presionar cualquier tecla para salir.");
        System.in.read();
        System.out.println("good bye.");
    }
    
}
