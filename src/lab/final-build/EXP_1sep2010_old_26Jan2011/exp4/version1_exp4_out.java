import java.io.*;
import java.net.*;
import java.awt.*;
import java.lang.*;
import java.awt.event.*;

import javax.swing.*;

public class exp4_out extends JApplet 
{


	String[][] out = new String[20][100000] ;
	int variable_count = 0 ;
	int point_count = 0 ; 
	String[] variable_description ; //= new String[20] ;

	public void readParam(){
		variable_count = Integer.parseInt(getParameter("variableCount"));
		point_count = Integer.parseInt(getParameter("valueCount"));
	        variable_description = new String[variable_count] ;
		int i ;
		for ( i = 0 ; i < variable_count ; i++ )
		{
			variable_description[i] = getParameter("variableDescription".concat(String.valueOf(i)));
			out[i] = getParameter("value".concat(String.valueOf(i))).split("/");
			
		}
	}
	public  void init()
	{
		readParam();   // TO get the values from the parameters 
		
		//Schedule a job for the event-dispatching thread:
		//creating and showing this application's GUI.
		javax.swing.SwingUtilities.invokeLater(new Runnable() {
				public void run() {
				//Turn off metal's use of bold fonts
				UIManager.put("swing.boldMetal", Boolean.FALSE);
				createAndShowGUI();
				}
				});
	}

	/**
	 * Create the GUI and show it.  For thread safety,
	 * this method should be invoked from the
	 * event-dispatching thread.
	 */

	private  void createAndShowGUI() {
		MyPanel myPane = new MyPanel();
		myPane.setOpaque(true);
		setContentPane(myPane);
	}
					 

	public  class MyPanel extends JPanel  implements ActionListener 
	{
		JPanel top ;   // Panel with ComboBox and the Label
		drawPanel graphPanel ;   // graph Panel 
		JComboBox output ; // what to plot on the Y axis 
		JLabel output_l ; // Label of the JCombo Box 

		int output_selected = 1 ; // Which output should be shown on the Y Axis 
		public MyPanel()
		{

			super(new BorderLayout());
			top = new JPanel();
			graphPanel = new drawPanel();

			output = new JComboBox ( variable_description) ;
			output.setSelectedIndex(1);
			output.setMaximumRowCount(variable_count);
			output.addActionListener(this);

			output_l = new JLabel("Select the Y axis ");

			top.add(output_l);
			top.add(output);
			add(top , 	BorderLayout.NORTH);
			add( graphPanel, 	BorderLayout.CENTER);

		}
		public void actionPerformed(ActionEvent e )
		{
			 JComboBox cb = (JComboBox)e.getSource();
			 if ( cb == output)
			 {
				 output_selected = cb.getSelectedIndex();
				 if ( output_selected != 0 ) // bec the  0th element is the TIME 
				 {
				 	repaint();
				 }
			 }
		}


		public class drawPanel extends JPanel 
		{
			public drawPanel()
			{
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
				for( i = 0 ; i < point_count - 1 ; i++ )
				{
					g2d.drawLine(20+2*i , 400-(int)Math.round(Double.parseDouble(out[output_selected][i])*300) , 20 + (i+1)*2 , 400-(int)Math.round(Double.parseDouble(out[output_selected][i+1])*300) );
				}

				g2d.setStroke(new BasicStroke(2));
				g2d.setColor(Color.black);
				g2d.drawLine(20 , 420 ,20  ,  40 );
				g2d.drawLine(0 , 400 , 500  , 400 );


				g2d.setFont( new Font("Arial" , Font.BOLD , 18));
				g2d.drawString("WAVEFORM OF THE SELECTED OUTPUT", 10 , 20 );

				g2d.drawString("Time --> ",  150 , 440 );
				g2d.rotate(-3.14/2 , 16 , 300 );
				g2d.drawString(output.getSelectedItem().toString(), 16 , 300 );
				g2d.rotate(3.14/2 , 16 , 300 );

			}
		}
	}
}


