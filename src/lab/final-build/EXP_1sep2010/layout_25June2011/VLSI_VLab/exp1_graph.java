import java.applet.*;
import java.io.*;
import java.net.*;
import java.awt.*;
import java.lang.*;
import javax.swing.*;

public class exp1_graph extends JPanel 
{
	String fileToRead = "outfile";

	StringBuffer strBuff;
	TextArea txtArea;
	String myline;

	double[] time = new double[1000] ;
	double[] V_in = new double[1000] ;
	double[] V_out = new double[1000] ;
	int no_values = 0 ;
	public  exp1_graph(URL url){
		String line;
		try{
			InputStream in = url.openStream();
			BufferedReader bf = new BufferedReader(new InputStreamReader(in));
			strBuff = new StringBuffer();
			myline = bf.readLine();
			while(!myline.equals("Values:"))
			{
				myline = bf.readLine();
			}
			int i = 0 ;
			while((line = bf.readLine()) != null){
				line = bf.readLine();
				line = bf.readLine();
				time[i] = Double.parseDouble(line);
				line = bf.readLine();
				line = bf.readLine();
				V_out[i] = Double.parseDouble(line);
				line = bf.readLine();
				line = bf.readLine();
				V_in[i] = Double.parseDouble(line);
				i++;
			}
			no_values = i ;

			repaint();

			System.out.println("Hi I am in the contrct func of the exp1_graph class :)");
		}
		catch(IOException e){
			e.printStackTrace();
		}
		JLabel l = new JLabel("Hi");
		add(l);
	}
	public void paint(Graphics g)
	{
		System.out.println("Hi I am in the gpaint func of the exp1_graph class :)");
		int i ;
		Graphics2D g2d = (Graphics2D)g ;
		g2d.setStroke(new BasicStroke(3));

		g2d.setColor(Color.red);
		for( i = 0 ; i < no_values - 1 ; i++ )
		{
			g2d.drawLine(100+3*i , 400-(int)Math.round(V_in[i]*200) , 100 + 3*(i+1) , 400-(int)Math.round(V_in[i+1]*200) );
		}
		g2d.drawLine(500, 50 , 550 , 50);
		g2d.drawString("Input Voltage ",  600 , 50 );

		g2d.setColor(Color.blue);
		for( i = 0 ; i < no_values - 1 ; i++ )
		{
			g2d.drawLine(100+3*i , 400-(int)Math.round(V_out[i]*200) , 100 + 3*(i+1) , 400-(int)Math.round(V_out[i+1]*200) );
		}
		g2d.drawLine( 500 , 80 , 550 , 80);
		g2d.drawString("Output Voltage ",  600 , 80 );

		g2d.setStroke(new BasicStroke(2));
		g2d.setColor(Color.white);
			g2d.drawLine(95 , 500 , 95  , 100 );
			g2d.drawLine(95 , 290 , 1000  , 290 );

	}
	
}


