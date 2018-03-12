import java.io.BufferedReader;
import java.io.File;
import java.io.FileOutputStream;
import java.io.FileReader;
import java.io.IOException;
import java.io.OutputStream;
import java.nio.charset.Charset;


public class Include {

	/**
	 * @param args
	 * @throws Exception 
	 */
	public static void main(String[] args) throws Exception {
		// TODO Auto-generated method stub

		String ficheroEntrada = null;
		String ficheroSalida = null;
		if( args == null || args.length < 2 ) {
			System.out.println("Error: debe indicar un nombre de fichero de entrada y otro de salida");
			System.exit(-1);
		}
		
		ficheroEntrada = args[0];
		System.out.println("ficheroEntrada = " + ficheroEntrada);
		ficheroSalida = args[1];
		System.out.println("ficheroSalida = " + ficheroSalida);
		
		String textoEntrada = "";
		String textoSalida = "";
		
		textoEntrada = readFile(ficheroEntrada);
		System.out.println("");
		System.out.println("textoEntrada:");
		System.out.println(textoEntrada);
		
		String resto = textoEntrada;
		int posicionInicial = resto.indexOf("{{");
		int posicionFinal = resto.indexOf("}}");
		String fragmento = null;
		String textoFragmento = "";
		while( posicionInicial != -1 && posicionFinal != -1) {

			fragmento = resto.substring(posicionInicial+2, posicionFinal);
			textoFragmento = readFile(fragmento);
			System.out.println("");
			System.out.println("textoFragmento de \"" + fragmento + "\" :");
			System.out.println(textoFragmento);

			textoSalida = textoSalida + resto.substring(0, posicionInicial);
			textoSalida = textoSalida + textoFragmento;
			resto = resto.substring(posicionFinal+2);
			posicionInicial = resto.indexOf("{{");
			posicionFinal = resto.indexOf("}}");
		}
		textoSalida = textoSalida + resto;

		System.out.println("");
		System.out.println("textoSalida:");
		System.out.println(textoSalida);
		
		writeStringToFile(ficheroSalida, textoSalida);
	
	}

	/**
	 * Copia todo un fichero en un unico String
	 * 
	 * Metodo copiado de http://stackoverflow.com/questions/326390/how-to-create-a-java-string-from-the-contents-of-a-file
	 * 
	 * @param file
	 * @return
	 * @throws IOException
	 */
	public static String readFile( String file ) throws IOException {
	    BufferedReader reader = new BufferedReader( new FileReader (file));
	    String         line = null;
	    StringBuilder  stringBuilder = new StringBuilder();
	    String         ls = System.getProperty("line.separator");

	    while( ( line = reader.readLine() ) != null ) {
	        stringBuilder.append( line );
	        stringBuilder.append( ls );
	    }

	    return stringBuilder.toString();
	}	
	
	
	
    /**
     * Writes a String to a file creating the file if it does not exist.
     *
     * @param file  the file to write
     * @param data  the content to write to the file
     * @param encoding  the encoding to use, {@code null} means platform default
     * @param append if {@code true}, then the String will be added to the
     * end of the file rather than overwriting
     * @throws IOException in case of an I/O error
     * @since 2.3
     */
    public static void writeStringToFile(String filename, String data) throws IOException {
        OutputStream out = null;
    	if( data != null ) {
    		File file = new File(filename);
            out = new FileOutputStream(file);
            out.write(data.getBytes());
            out.close(); // don't swallow close Exception if copy completes normally
    	}
    }
    
    
    /**
     * Opens a {@link FileOutputStream} for the specified file, checking and
     * creating the parent directory if it does not exist.
     * <p>
     * At the end of the method either the stream will be successfully opened,
     * or an exception will have been thrown.
     * <p>
     * The parent directory will be created if it does not exist.
     * The file will be created if it does not exist.
     * An exception is thrown if the file object exists but is a directory.
     * An exception is thrown if the file exists but cannot be written to.
     * An exception is thrown if the parent directory cannot be created.
     * 
     * @param file  the file to open for output, must not be {@code null}
     * @param append if {@code true}, then bytes will be added to the
     * end of the file rather than overwriting
     * @return a new {@link FileOutputStream} for the specified file
     * @throws IOException if the file object is a directory
     * @throws IOException if the file cannot be written to
     * @throws IOException if a parent directory needs creating but that fails
     * @since 2.1
     */
    public static FileOutputStream openOutputStream(File file, boolean append) throws IOException {
        if (file.exists()) {
            if (file.isDirectory()) {
                throw new IOException("File '" + file + "' exists but is a directory");
            }
            if (file.canWrite() == false) {
                throw new IOException("File '" + file + "' cannot be written to");
            }
        } else {
            File parent = file.getParentFile();
            if (parent != null) {
                if (!parent.mkdirs() && !parent.isDirectory()) {
                    throw new IOException("Directory '" + parent + "' could not be created");
                }
            }
        }
        return new FileOutputStream(file, append);
    }
    
    public static void write(String data, OutputStream output) throws IOException {
        if (data != null) {
            output.write(data.getBytes());
        }
    }
    
    
}
