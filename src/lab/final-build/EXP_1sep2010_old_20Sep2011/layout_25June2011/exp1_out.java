import java.applet.*;
import java.io.*;
import java.net.*;
import java.awt.*;
import java.lang.*;

public class exp1_out extends Applet 
{
	String fileToRead = "outfile";

	StringBuffer strBuff;
	TextArea txtArea;
	Graphics g;
	String myline;

	double[] time = new double[1000] ;
	double[] V_in = new double[1000] ;
	double[] V_out = new double[1000] ;
	int no_values = 0 ;
	public void init(){
	//	setBackground(Color.black);
		txtArea = new TextArea(100, 100);
		txtArea.setEditable(false);
//		add(txtArea, "center");
	//	String prHtml = this.getParameter("fileToRead");
	//	if (prHtml != null) fileToRead = new String(prHtml);
		readFile();
	}

	public void readFile(){
		String line;
		URL url = null;
		try{
			url = new URL(getCodeBase(), fileToRead);
		}
		catch(MalformedURLException e){}

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
//				strBuff.append(line + "\n");
			//	System.out.println("hi");
			}
			no_values = i ;
			repaint();
//			txtArea.append("File Name : " + fileToRead + "\n");
//			txtArea.append(strBuff.toString());
		}
		catch(IOException e){
			e.printStackTrace();
		}
	}
	public void paint(Graphics g)
	{
		int i , j;
		Graphics2D g2d = (Graphics2D)g ;
// Back Ground -------------------------------------------------------------------
		g2d.setStroke(new BasicStroke(2));
		g2d.setColor(new Color(204,255,255));
		g2d.fillRect(0,0,1400,650);
		g2d.setColor(Color.lightGray);
		for ( i = 0 ; i < 1300 ; i += 20 )
		{
			for (j = 0 ; j < 650 ; j +=5 )
			{
				g2d.fillOval(i , j , 1 , 2);
			}
		}
		for ( i = 0 ; i < 1300 ; i += 5 )
		{
			for (j = 0 ; j < 650 ; j +=20 )
			{
				g2d.fillOval(i , j , 2 , 1);
			}
		}
//--------------------------------------------------------------------------------

		g2d.setStroke(new BasicStroke(2));
		g2d.setColor(Color.red);
		for( i = 0 ; i < no_values - 1 ; i++ )
		{
			g2d.drawLine(100+5*i , 500-(int)Math.round(V_in[i]*400) , 100 + 5*(i+1) , 500-(int)Math.round(V_in[i+1]*400) );
		}
		g2d.drawLine(1100, 50 , 1150 , 50);
		g2d.drawString("Input Voltage ", 1200 , 50 );

		g2d.setColor(Color.blue);
		for( i = 0 ; i < no_values - 1 ; i++ )
		{
			g2d.drawLine(100+5*i , 500-(int)Math.round(V_out[i]*400) , 100 + 5*(i+1) , 500-(int)Math.round(V_out[i+1]*400) );
		}


		g2d.drawLine( 1100 , 80 ,1150 , 80);
		g2d.drawString("Output Voltage ", 1200 , 80 );

		g2d.setStroke(new BasicStroke(2));
		g2d.setColor(Color.black);
			g2d.drawLine(100 , 520 ,100  ,  40 );
			g2d.drawLine(100 , 280 , 1200  , 280 );


		g2d.setFont( new Font("Arial" , Font.BOLD , 20));
		g2d.drawString("WAVEFORM OF THE INPUT AND OUTPUT VOLTAGES OF SIMULATED CIRCUIT", 200 , 20 );

		g2d.drawString("Time --> ",  550 , 540 );
		g2d.rotate(-3.14/2 , 30 , 260 );
		g2d.drawString("Volt --> ",  30 , 260 );
		g2d.rotate(3.14/2 , 30 , 260 );

	}
}


