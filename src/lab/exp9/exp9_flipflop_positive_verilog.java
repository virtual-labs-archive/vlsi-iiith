import java.util.*;
import java.util.PropertyPermission.*;
import java.awt.*;
import java.awt.Color.*;
import java.awt.MediaTracker.*;
import java.awt.event.*;
import java.text.*;
import java.awt.datatransfer.*;
import java.net.*;
import java.net.URLEncoder.*;
import java.io.*;
import java.io.File.*;
import netscape.javascript.*;

import javax.swing.*;
import javax.swing.text.*;
import javax.swing.tree.*;
import javax.swing.table.*;
import javax.swing.ImageIcon.*;


public class exp9_flipflop_positive_verilog extends JApplet 
{
	public  void init()
	{
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

	public  class MyPanel extends JPanel  implements ActionListener , MouseMotionListener 
	{
		/** Work Panel Variables ************************************************************************************************/
		int exp_type = 1 ; 
                int input_type = 1;  // 1 ,2 , 3 , 4  

		double scale_x = 1 ;  // scaling of work pannel 
		double scale_y = 1 ;

		int work_x ;
		int work_y ;
		int wire_button  = 0 ;// 0 not presed already , 1 -> already pressed 
		int img_button_pressed = -1 ;  
		int draw_work = 0 ; // if 1 -> draw the image on work 

		int[][] work_mat ;   // if -1 => no comp is there on mat .. if i the (i)th comp of node_comp is present
		int[][] end_points_mat ;   // 
		int[][] wire_mat ;   // if -1 => no comp is there on mat .. if i the (i)th comp of node_comp is present
		int[][] wire_points_mat ;   // 

		int work_img_width = 50;
		int work_img_height = 50;
		int work_panel_width = 820 ;
		int work_panel_height = 540;
		int grid_size = 20 ; // size of each box in grid 

		int node_drag = -1 ; // it rep the index of comp_node which is selected to be draged 
		int wire_drag = -1 ; // it rep the index of wire which is selected to be extented from its end 
		int wire_drag_end = 1 ; // from which end it should be draged 
		int[] comp_count = new int[50] ; //  comp_count[i] represents the count of ( comp"i".jpg ) component ..
		int total_comp = 0 ;
		node[] comp_node = new node[50];

		int total_wire = 0 ;
		line[] wire = new line[50];

		// Dialog Box -----------------------------------
		myDialog[] dialog = new myDialog[50]  ; //in this exp at max 6 comp can be used  (I assume that comp is used once )
		JFrame[] fr = new JFrame[50] ;
		String[] comp_str = {		// This will store what should at the Dialog Box for each component
			"This is shows which component is selected ." ,
			"PMOS ", "Ground Terminal " ," Wire ",  // 1, 2 , 3
			"INPUT " ," MUX ", " " , // 4 , 5 ,6

			"NMOS", "Capacitor" ,"Vdd ",  // 7 , 8 , 9 
			"OUTPUT",  "Latch " ,"Inductor ",  // 10, 11 , 12
			" " ," "};

		//*************************************************************************************************************************************
		//Circuit Component values which need to be send to ngspice ***************************************************************************


		//---------------------------------------------------------------------------------------------------------------------------------------
		// POINTS NUMBERING FOR ALL COMPONENTS ---------------------------------------------------------------------------------------------------
		// Latch1 = 0-2 ;; Latch2 = 3-5 ;; OUTPUT = 6 ; INPUT = D:7 , clk: 8 , clk': 9;

		//----------------------------------------------------------------------------------------------------------------------------------------


		// also update in Dialog Box constructor 
		
// For Input D 
		String MinVolt1 = " 0";
		String MaxVolt1 = "1.1";
		String RiseTime1 = "1n";
		String FallTime1 = "1n";
		String StepSize1 = "5n";
		String TotalTime1 = "10n";
		
// For Input clk		
		String MinVolt2 = " 0";
		String MaxVolt2 = "1.1";
		String RiseTime2 = "1n";
		String FallTime2 = "1n";
		String StepSize2 = "5n";
		String TotalTime2 = "10n";
// For nothing 
		String MinVolt3 = " 0";
		String MaxVolt3 = "1.1";
		String RiseTime3 = "1n";
		String FallTime3 = "1n";
		String StepSize3 = "5n";
		String TotalTime3 = "10n";
		

		//*************************************************************************************************************************************
		boolean simulate_flag = false ;
		Image img[] = new Image[20] ;
		ImageIcon icon[] = new ImageIcon[20] ;

		ImageIcon icon_simulate ;
		ImageIcon icon_graph ;

		MediaTracker mt ;
		URL base ;

		public 	class node 
		{
			int node_x ;
			int node_y ;
			int img_no ; // indicates which component 
			int comp_no ; // n -> (n)th comp ,  ie 1 -> first c comp ;; indicates which particular comp is this , if more than one  same type Components are present . 
			int width ;
			int height ;

			int virtual_w ;
			int virtual_h ;

			double angle ;
			int angle_count ; // 0-> 0 / 360 degree , 1 -> 90 degree , 2 -> 180 degree , 3 -> 270 degree

			boolean del ;

			// for connection with wire 
			int end_pointsX[] = new int[6];
			int end_pointsY[] = new int[6];
			int count_end_points = 0 ;

			public node (int x , int y , int no , int w , int h , int compNo)
			{
				comp_no = compNo ;
				node_x = x ;
				node_y = y ;
				img_no = no ;
				del = false ;

				virtual_w = width = w ;
				virtual_h = height = h ;
				angle = 0 ;
				angle_count = 0 ;
	

				make_end_points(no);
			}
			public void update_end_points_mat(int img)
			{
			// Latch1 = 0-2 ;; Latch2 = 3-5 ;; OUTPUT = 6 ; INPUT = D:7 , clk: 8 , clk': 9;
				
				if ( img == 4 || img == 10 ) //  INPUT , OUTPUT
				{

					for ( int i = end_pointsX[0] - 4 ; i < end_pointsX[0] +5 ; i ++ )
					{
						for ( int j = end_pointsY[0] - 4 ; j < end_pointsY[0] +5; j ++ )
						{
							if ( img == 4 ) 				// INPUT
							{
								end_points_mat[i][j] = 6  + comp_no  ; // 7-9 ( D , clk , clk' )
												       // as comp_no startsfrom 1
								
							}
							else 						// OUTPUT :6
							{
								end_points_mat[i][j] =  6;
							}
						}
					}
				}
				else if ( img == 11 ) // Latch
				{
					for ( int k = 0 ; k < 3 ; k ++ )
					{
						for ( int i = end_pointsX[k] - 4 ; i < end_pointsX[k] +5 ; i ++ )
						{
							for ( int j = end_pointsY[k] - 4 ; j < end_pointsY[k] +5; j ++ )
							{
								end_points_mat[i][j] = k + 3*(comp_no - 1); // 0-2 Latch1 and 
													   //  3-5 Latch2
													  // as comp_no startsfrom 1	
							}
						}
					}
				}
				
			}
			public void make_end_points(int img )
			{
				
				if ( img == 11 ) // Latch 
				{
					// Rotation is not allowed in MUX 
					count_end_points = 3;

					// Points are in sequence of CLOCKWISE 
					end_pointsX[0] = node_x + width / 2 ;
					end_pointsY[0] = node_y ;

					end_pointsX[1] = node_x + width ;
					end_pointsY[1] = node_y + height / 2 ;

					end_pointsX[2] = node_x  ;
					end_pointsY[2] = node_y +  height/2 ;

				}
	
				if ( img == 1 || img == 7) // C/NMOS 
				{
					count_end_points = 3;

					int a , b , c , d , e , f ;
					a = width ; b= 0 ; c = width ;d = height ; e = 0 ; f = height / 2 ;

					if ( angle_count == 1 )
					{
						a = 0 ; b= width ; c = -height ; d = width ; e = -height / 2 ; f = 0 ;
					}
					else if ( angle_count == 2 )
					{
						a = -width ; b= 0 ; c = -width ; d = -height ; e = 0 ; f = -height / 2 ;
					}
					else if ( angle_count == 3 )
					{
						a = 0 ; b= -width ; c = height ; d = -width ; e = height/2 ; f = 0 ;
					}
					end_pointsX[0] = node_x + a ;
					end_pointsY[0] = node_y + b;

					end_pointsX[1] = node_x + c ;
					end_pointsY[1] = node_y + d ;

					end_pointsX[2] = node_x + e  ;
					end_pointsY[2] = node_y +  f ;
					
				}
				else if ( img == 8 ) // Capacitor 
				{
					count_end_points = 2 ;
					int a , b , c , d  ;
					a = 0 ; b= height/2 ; c = width ;d =  height / 2 ;

					if ( angle_count == 1 )
					{
						a = -height/2 ; b= 0 ; c = -height/2 ; d = width ;
					}
					else if ( angle_count == 2 )
					{
						a = 0 ; b= -height/2 ; c = -width ;d =  -height / 2 ;
					}
					else if ( angle_count == 3 )
					{
						a = height/2 ; b= 0 ; c = height/2 ; d = -width ;
					}
					end_pointsX[0] = node_x + a ;
					end_pointsY[0] = node_y + b;

					end_pointsX[1] = node_x + c ;
					end_pointsY[1] = node_y + d ;

				}
				else if ( img == 2 || img == 9 ) //Gnd , Vdd
				{
					count_end_points = 1;
					int a , b  ;
					a = width / 2 ; b= 0 ;

					if ( angle_count == 1 )
					{
						a = 0 ; b= width / 2 ;
					}
					else if ( angle_count == 2 )
					{
						a = -width / 2 ; b= 0 ;
					}
					else if ( angle_count == 3 )
					{
						a = 0 ; b= -width / 2 ;
					}
					end_pointsX[0] = node_x + a ;
					end_pointsY[0] = node_y + b;
				}
				else if ( img == 4 || img == 10 ) // Input , OutPut
				{
					count_end_points = 1 ;
					if ( img == 4 )     		// INPUT
					{
						end_pointsX[0] = node_x + width ;
						end_pointsY[0] = node_y  ;
					}
					else     // OUTPUT
					{
						end_pointsX[0] = node_x  ;
						end_pointsY[0] = node_y  ;
					}
				}
				update_end_points_mat(img);
			}
			public void del ()
			{
				del = true ;
			}
			public void rotate(int index )
			{
			 	remove_mat() ;// delete the previous value from work_mat
		//		angle = angle +  (java.lang.Math.PI/2);
				angle_count = (angle_count + 1 )% 4 ;
				angle = angle_count *  (java.lang.Math.PI/2);
				if ( (angle - 2* java.lang.Math.PI ) > .001 )
				{
					angle = 0 ;
					virtual_w = width ;
					virtual_h = height ;
				}
				if (angle_count == 0 ) // 90 degree
				{
					virtual_w = width;
					virtual_h = height  ;
				}
				else if (angle_count == 1 ) // 90 degree
				{
					virtual_w = -height;
					virtual_h = width  ;
				}
				else if (angle_count == 2 ) // 180 degree
				{
					virtual_w = -width ;
					virtual_h = -height ;
				}
				else if (angle_count == 3 ) // 270 degree
				{
					virtual_w = height ;
					virtual_h = -width ;
				}
				update_mat(index); // update the matrix value to work_mat // index is the index of the node_comp matrix
			}
			public void update_mat(int index) // update the matrix value to work_mat // index is the index of the node_comp matrix
			{
//				System.out.println("index");
		//		System.out.println(index);
				int i , j ;
				for ( i = node_x ;  ;)
				{
						if ( virtual_w > 0 && i >= node_x + virtual_w  ){break;}
						else if( virtual_w < 0 && i <= node_x + virtual_w  ){break;}

						for ( j = node_y ;  ;  )
						{
							if ( virtual_h > 0 && j >= node_y + virtual_h  ){break;}
							else if( virtual_h < 0 && j <= node_y + virtual_h  ){break;}

							work_mat[i][j] =  index ;   // update the matrix as the img is selected  
					
					//		System.out.println(index);
							if ( virtual_h > 0 ){j++;}else{j--;} 
						}

						if ( virtual_w > 0 ){i++;}else{i--;} 
				}
				make_end_points(img_no);
			}
			public void remove_mat() // delete the previous value from work_mat
			{
				int i , j ;
					for ( i = node_x ;  ;  )
					{
						if ( virtual_w > 0 && i >= node_x + virtual_w  ){break;}
						else if( virtual_w < 0 && i <= node_x + virtual_w  ){break;}
						for ( j = node_y ;  ;  )
						{
							if ( virtual_h > 0 && j >= node_y + virtual_h  ){break;}
							else if( virtual_h < 0 && j <= node_y + virtual_h  ){break;}
				
							work_mat[i][j] =  -1 ;   // update the matrix as the img is selected  
							if ( virtual_h > 0 ){j++;}else{j--;} 
						}
						if ( virtual_w > 0 ){i++;}else{i--;} 
					}
				remove_end_points();
			}
			public void remove_end_points()
			{
				for ( int k = 0 ; k < count_end_points ; k ++ )
				{
					for ( int i = end_pointsX[k] - 4 ; i < end_pointsX[k] +5 ; i ++ )
					{
						for ( int j = end_pointsY[k] - 4 ; j < end_pointsY[k] +5; j ++ )
						{
							end_points_mat[i][j] = -1;
						}
					}
					
				}
			}
		}
		public class line 
		{
			int x1 , y1 , x2 , y2 ; // end and start point of wire 
			int x[] = new int[20];
			int y[] = new int[20];
			int end_index ;
			boolean del ;
			public line (int a, int b , int c , int d)
			{
				x1 = a ;
				y1 = b ;
				x2 = c ;
				y2 = d ;
				del = false ;
				x[0] = a ; x[1] = c ;
				y[0] = b ; y[1] = d ;
				end_index = 1 ;
			}
			public void update2( int c , int d ) // update end point
			{
				x2 = c ;
				y2 = d ;
//				end_index++;
				x[end_index] = c;
				y[end_index] = d;
			}
			public void update1( int c , int d ) // update start point 
			{
				x[0] = x1 = c ;
				y[0] = y1 = d ;
			}
			public void update(int a , int b ) // update middle point 
			{
				end_index++;
				x[end_index] = a;
				y[end_index] = b ;
			}
			public void update_wire_mat(int index )
			{
				int i , j , tx1 , ty1 , tx2 , ty2 ; // local vriables 
				for ( int k = 0 ; k < end_index ; k ++)
				{ 
					tx1 = x[k] ;	tx2 = x[k + 1] ;
					ty1 = y[k] ;	ty2 = y[k + 1] ;
					for ( i = x1 ;  ;)
					{
						if ( tx2 >= tx1 && i >= tx2  ){break;}
						else if( tx2 <= tx1 && i <= tx2 ){break;}
						for ( j = ty1 - 4 ; j < ty1 + 5 ; j ++)
						{			
							wire_mat[i][j] =  index ;   // update the matrix as the img is selected  
						}

						if ( tx2 > tx1 ){i++;}else{i--;} 
					}
					for ( i = ty1 ;  ;)
					{
						if ( ty2 >= ty1 && i >= ty2  ){break;}
						else if( ty2 <= ty1 && i <= ty2 ){break;}
						for ( j = tx2 - 4 ; j < tx2 + 5 ; j ++)
						{
							wire_mat[j][i] =  index ;   // update the matrix as the img is selected  
						}
	
						if ( ty2 > ty1 ){i++;}else{i--;} 
					}
				}
				
			}
			public void update_mat (int index)
			{
				for ( int i = x1 - 4 ; i < x1 +5; i ++ )
				{
					for ( int j = y1 - 4 ; j < y1 + 5; j ++ )
					{
						wire_points_mat[i][j] = index;
					}
				}				
				for ( int i = x2 - 4 ; i < x2 +5; i ++ )
				{
					for ( int j = y2 - 4 ; j < y2 + 5; j ++ )
					{
						wire_points_mat[i][j] = index;
					}
				}
				update_wire_mat(index);
			}
			public void del()
			{
				update_mat(-1);
				del = true ;
			}
		}

		public class myDialog extends JDialog implements ActionListener 
		{
			JSpinner length ;
			SpinnerModel length_model ;
			SpinnerModel width_model ;
			JComboBox length_unit ;
			JSpinner width;
			JComboBox width_unit ;
			JSpinner capacitance;
			JComboBox capacitance_unit ;
					// FOR INPUT 
					JSpinner minVoltage ;
					JSpinner maxVoltage ;
					JSpinner riseTime ;
					JSpinner fallTime ;
					JSpinner stepSize ;
					JSpinner totalTime ;

			Container cp;
			JButton del ;
			JButton ok ;
			JButton rotate ;
			String[] unit = {"m","u","n"};
			
			int node_index ;
			public myDialog (JFrame fr , String comp, int node_no)
			{

				super (fr , "Component Description " , true ); // true to lock the main screen 
				node_index = node_no ;
				//	System.out.println(node_no ) ;

				cp = getContentPane();
				SpringLayout layout = new SpringLayout();
				cp.setLayout(layout);
				setSize(360 , 210);

				if ( comp_node[node_no].img_no == 8 ) // capacitor 
				{
					SpinnerModel capacitance_model =	new SpinnerNumberModel(100, //initial value
							0, //min
							1000, //max
							1);  //step
					JLabel comp_name = new JLabel("<html><font size=4><b>"+comp+" "+comp_node[node_no].comp_no+"</b></font></html>" );//,icon[icon_no],JLabel.CENTER);

					layout.putConstraint(SpringLayout.WEST , comp_name , 50,   SpringLayout.WEST , cp );
					layout.putConstraint(SpringLayout.NORTH , comp_name , 20,  SpringLayout.NORTH , cp);

					capacitance = new JSpinner(capacitance_model);
					JLabel c = new JLabel("Select the Capacitance :");
					
					capacitance_unit = new JComboBox(unit);
					capacitance_unit.addActionListener(this);
					capacitance_unit.setSelectedIndex(2);
					
					JLabel c_unit = new JLabel("farad");

					del = new JButton("Delete Component");
					
					ok = new JButton("O.K");
					rotate = new JButton("Rotate");
					
					layout.putConstraint(SpringLayout.WEST , c , 20,   SpringLayout.WEST , cp );
					layout.putConstraint(SpringLayout.NORTH , c ,60,  SpringLayout.NORTH , cp);

					layout.putConstraint(SpringLayout.WEST , capacitance , 20,   SpringLayout.EAST , c );
					layout.putConstraint(SpringLayout.NORTH , capacitance , 60,  SpringLayout.NORTH , cp);

					layout.putConstraint(SpringLayout.WEST , capacitance_unit , 10,   SpringLayout.EAST , capacitance );
					layout.putConstraint(SpringLayout.NORTH , capacitance_unit , 60,  SpringLayout.NORTH , cp);
					
					layout.putConstraint(SpringLayout.WEST , del , 20,   SpringLayout.WEST , cp );
					layout.putConstraint(SpringLayout.NORTH , del , 100,  SpringLayout.NORTH , cp);
					
					layout.putConstraint(SpringLayout.WEST , rotate , 10,   SpringLayout.EAST , del);
					layout.putConstraint(SpringLayout.NORTH , rotate , 100,  SpringLayout.NORTH , cp);

					layout.putConstraint(SpringLayout.WEST , ok , 10,   SpringLayout.EAST , rotate );
					layout.putConstraint(SpringLayout.NORTH , ok , 100,  SpringLayout.NORTH , cp);
					

					cp.add(comp_name);
					cp.add(c);
					cp.add(capacitance);
					cp.add(capacitance_unit);
					cp.add(del);
					cp.add(ok);
					cp.add(rotate);
					ok.addActionListener(this);
					del.addActionListener(this);
					rotate.addActionListener(this);
				}
				else if ( comp_node[node_no].img_no == 2 || comp_node[node_no].img_no == 9 ) // terminal
				{

					JLabel comp_name = new JLabel("<html><font size=4><b>"+comp+" "+comp_node[node_no].comp_no+"</b></font></html>" );//,icon[icon_no],JLabel.CENTER);

					layout.putConstraint(SpringLayout.WEST , comp_name , 100,   SpringLayout.WEST , cp );
					layout.putConstraint(SpringLayout.NORTH , comp_name , 20,  SpringLayout.NORTH , cp);

					del = new JButton("Delete Component");
					
					ok = new JButton("O.K");
					rotate = new JButton("Rotate");
					layout.putConstraint(SpringLayout.WEST , del , 10,   SpringLayout.WEST , cp );
					layout.putConstraint(SpringLayout.NORTH , del , 80,  SpringLayout.NORTH , cp);

					layout.putConstraint(SpringLayout.WEST , rotate , 10,   SpringLayout.EAST , del);
					layout.putConstraint(SpringLayout.NORTH , rotate , 80,  SpringLayout.NORTH , cp);
					
					layout.putConstraint(SpringLayout.WEST , ok , 10,   SpringLayout.EAST , rotate );
					layout.putConstraint(SpringLayout.NORTH , ok , 80,  SpringLayout.NORTH , cp);
					
					cp.add(comp_name);
					cp.add(del);
					cp.add(ok);
					cp.add(rotate);
					ok.addActionListener(this);
					del.addActionListener(this);
					rotate.addActionListener(this);
					
				}
				else if (comp_node[node_no].img_no == 4 ) // INPUT 
				{
					
					SpinnerModel min_voltage =	new SpinnerNumberModel(0, //initial value
							0, //min
							1000, //max
							1);  //step
					SpinnerModel max_voltage =	new SpinnerNumberModel(1, //initial value
							0, //min
							1000, //max
							1);  //step
					
					SpinnerModel rise_time =	new SpinnerNumberModel(1, //initial value
							0, //min
							1000, //max
							1);  //step
					SpinnerModel fall_time =	new SpinnerNumberModel(1, //initial value
							0, //min
							1000, //max
							1);  //step
					
					SpinnerModel step_size =	new SpinnerNumberModel(5, //initial value
							0, //min
							1000, //max
							1);  //step
					SpinnerModel total_time =	new SpinnerNumberModel(10, //initial value
							0, //min
							1000, //max
							1);  //step

					JLabel comp_name ;
					if ( comp_node[node_no].comp_no == 1)
					{
						comp_name = new JLabel("<html><font size=5><b>"+comp+" D </b></font></html>" );//,icon[icon_no],JLabel.CENTER);
					}
					else if ( comp_node[node_no].comp_no == 2)
					{
						comp_name = new JLabel("<html><font size=5><b>"+comp+" CLK </b></font></html>" );//,icon[icon_no],JLabel.CENTER);
					}
					else
					{
						comp_name = new JLabel("<html><font size=5><b>"+comp+" "+comp_node[node_no].comp_no+"</b></font></html>" );//,icon[icon_no],JLabel.CENTER);
					}


					layout.putConstraint(SpringLayout.WEST , comp_name , 70,   SpringLayout.WEST , cp );
					layout.putConstraint(SpringLayout.NORTH , comp_name , 20,  SpringLayout.NORTH , cp);

					minVoltage = new JSpinner(min_voltage);
					maxVoltage = new JSpinner(max_voltage);
					riseTime = new JSpinner(rise_time);
					fallTime = new JSpinner(fall_time);
					stepSize = new JSpinner(step_size);
					totalTime = new JSpinner(total_time);

					JLabel a = new JLabel("Min Volt");
					JLabel b = new JLabel("Rise Time");
					
					
				//	width_unit = new JComboBox(unit);
				//	width_unit.addActionListener(this);
				//	width_unit.setSelectedIndex(2);
					
			
					layout.putConstraint(SpringLayout.WEST , a , 20,   SpringLayout.WEST , cp );
					layout.putConstraint(SpringLayout.NORTH , a , 50,  SpringLayout.NORTH , cp);

					layout.putConstraint(SpringLayout.WEST , minVoltage , 20,   SpringLayout.EAST , a );
					layout.putConstraint(SpringLayout.NORTH , minVoltage , 50,  SpringLayout.NORTH , cp);
					
					
					layout.putConstraint(SpringLayout.WEST , b , 20,   SpringLayout.EAST , minVoltage );
					layout.putConstraint(SpringLayout.NORTH , b , 50,  SpringLayout.NORTH , cp);


					layout.putConstraint(SpringLayout.WEST , riseTime , 20,   SpringLayout.EAST , b );
					layout.putConstraint(SpringLayout.NORTH , riseTime , 50,  SpringLayout.NORTH , cp);

					JLabel c = new JLabel("Max Volt");
					JLabel d = new JLabel("Fall Time");
					
				//	length_unit = new JComboBox(unit);
				//	length_unit.addActionListener(this);
				//	length_unit.setSelectedIndex(2);
					

					layout.putConstraint(SpringLayout.WEST , c , 20,   SpringLayout.WEST , cp );
					layout.putConstraint(SpringLayout.NORTH , c , 80,  SpringLayout.NORTH , cp);

					layout.putConstraint(SpringLayout.WEST , maxVoltage , 20,   SpringLayout.EAST , c );
					layout.putConstraint(SpringLayout.NORTH , maxVoltage , 80,  SpringLayout.NORTH , cp);
					
					
					layout.putConstraint(SpringLayout.WEST , d , 20,   SpringLayout.EAST , maxVoltage );
					layout.putConstraint(SpringLayout.NORTH , d , 80,  SpringLayout.NORTH , cp);


					layout.putConstraint(SpringLayout.WEST , fallTime , 20,   SpringLayout.EAST , d );
					layout.putConstraint(SpringLayout.NORTH , fallTime , 80,  SpringLayout.NORTH , cp);


					JLabel e = new JLabel("Step Size");
					JLabel f = new JLabel("Total Time");

					layout.putConstraint(SpringLayout.WEST , e , 20,   SpringLayout.WEST , cp );
					layout.putConstraint(SpringLayout.NORTH , e , 110,  SpringLayout.NORTH , cp);

					

					layout.putConstraint(SpringLayout.WEST , stepSize , 20,   SpringLayout.EAST , e );
					layout.putConstraint(SpringLayout.NORTH , stepSize , 110,  SpringLayout.NORTH , cp);
					
					
					layout.putConstraint(SpringLayout.WEST , f , 20,   SpringLayout.EAST , stepSize );
					layout.putConstraint(SpringLayout.NORTH , f , 110,  SpringLayout.NORTH , cp);


					layout.putConstraint(SpringLayout.WEST , totalTime , 10,   SpringLayout.EAST , f );
					layout.putConstraint(SpringLayout.NORTH , totalTime , 110,  SpringLayout.NORTH , cp);

					del = new JButton("Delete Component");
////////////////////////////////////////////////////////////////////////////////////
					del.setEnabled(false);
////////////////////////////////////////////////////////////////////////////////////
					ok = new JButton("O.K");
					rotate = new JButton("Rotate");

					layout.putConstraint(SpringLayout.WEST , del , 20,   SpringLayout.WEST , cp );
					layout.putConstraint(SpringLayout.NORTH , del , 140,  SpringLayout.NORTH , cp);

					layout.putConstraint(SpringLayout.WEST , ok , 30,   SpringLayout.EAST , del );
					layout.putConstraint(SpringLayout.NORTH , ok , 140,  SpringLayout.NORTH , cp);
					

					cp.add(comp_name);
					cp.add(a);
					cp.add(minVoltage);
				
					cp.add(b);
					cp.add(maxVoltage);
					cp.add(c);
					cp.add(riseTime);
				
					cp.add(d);
					cp.add(fallTime);
					cp.add(e);
					cp.add(stepSize);
				
					cp.add(f);
					cp.add(totalTime);
				
					cp.add(del);
					cp.add(ok);
				//	cp.add(rotate);
					ok.addActionListener(this);
				//	del.addActionListener(this);
				//	rotate.addActionListener(this);
				}
				else // NMOS chip 
				{
					length_model =	new SpinnerNumberModel(50, //initial value
							0, //min
							1000, //max
							1);  //step
					width_model =	new SpinnerNumberModel(100, //initial value
							0, //min
							1000, //max
							1);  //step

					JLabel comp_name = new JLabel("<html><font size=4><b>"+comp+" "+comp_node[node_no].comp_no+"</b></font></html>" );//,icon[icon_no],JLabel.CENTER);

					layout.putConstraint(SpringLayout.WEST , comp_name , 50,   SpringLayout.WEST , cp );
					layout.putConstraint(SpringLayout.NORTH , comp_name , 20,  SpringLayout.NORTH , cp);

					length = new JSpinner(length_model);
					width = new JSpinner(width_model);

					JLabel w = new JLabel("Select the Width :");
					
					
					width_unit = new JComboBox(unit);
					width_unit.addActionListener(this);
					width_unit.setSelectedIndex(2);
					
					del = new JButton("Delete Component");
////////////////////////////////////////////////////////////////////////////////////
					del.setEnabled(false);
////////////////////////////////////////////////////////////////////////////////////
					ok = new JButton("O.K");
					rotate = new JButton("Rotate");

					layout.putConstraint(SpringLayout.WEST , w , 20,   SpringLayout.WEST , cp );
					layout.putConstraint(SpringLayout.NORTH , w , 50,  SpringLayout.NORTH , cp);

					layout.putConstraint(SpringLayout.WEST , width , 20,   SpringLayout.EAST , w );
					layout.putConstraint(SpringLayout.NORTH , width , 50,  SpringLayout.NORTH , cp);

					layout.putConstraint(SpringLayout.WEST , width_unit , 10,   SpringLayout.EAST , width );
					layout.putConstraint(SpringLayout.NORTH , width_unit , 50,  SpringLayout.NORTH , cp);

					JLabel l = new JLabel("Select the Length :");
					length_unit = new JComboBox(unit);
					length_unit.addActionListener(this);
					length_unit.setSelectedIndex(2);
					

					layout.putConstraint(SpringLayout.WEST , l, 20,   SpringLayout.WEST , cp );
					layout.putConstraint(SpringLayout.NORTH , l , 80,  SpringLayout.NORTH , cp);

					layout.putConstraint(SpringLayout.WEST , length, 20,   SpringLayout.EAST , l );
					layout.putConstraint(SpringLayout.NORTH ,length , 80,  SpringLayout.NORTH , cp);

					layout.putConstraint(SpringLayout.WEST , length_unit , 10,   SpringLayout.EAST ,length );
					layout.putConstraint(SpringLayout.NORTH , length_unit , 80,  SpringLayout.NORTH , cp);
					
					layout.putConstraint(SpringLayout.WEST , del , 20,   SpringLayout.WEST , cp );
					layout.putConstraint(SpringLayout.NORTH , del , 120,  SpringLayout.NORTH , cp);

					layout.putConstraint(SpringLayout.WEST , rotate , 10,   SpringLayout.EAST , del);
					layout.putConstraint(SpringLayout.NORTH , rotate , 120,  SpringLayout.NORTH , cp);
					
					layout.putConstraint(SpringLayout.WEST , ok , 10,   SpringLayout.EAST , rotate );
					layout.putConstraint(SpringLayout.NORTH , ok , 120,  SpringLayout.NORTH , cp);
					

					cp.add(comp_name);
					cp.add(l);
					cp.add(length);
					cp.add(length_unit);
					cp.add(w);
					cp.add(width);
					cp.add(width_unit);
					cp.add(del);
					cp.add(ok);
					cp.add(rotate);
					ok.addActionListener(this);
					del.addActionListener(this);
					rotate.addActionListener(this);
				}
				addWindowListener( new WA());

			}
			String get_length()
			{
				if ( length_unit.getSelectedIndex() == 2 &&  Integer.parseInt(length.getValue().toString()) <= 45 ) // nano 
				{
					JOptionPane.showMessageDialog(null, "Length value is less the 45n , this is not allowed by this technology .");
//					length.setValue(45);
		//			length_model.setValue(45);
					return "45n" ;
				}
				else
				{
					return length.getValue().toString()+"n";
				}
				//return length.getValue().toString()+(String)length_unit.getSelectedItem();
			}
			String get_width()
			{
				
				if ( width_unit.getSelectedIndex() == 2 && Integer.parseInt(width.getValue().toString()) <= 90 ) // nano 
				{
					JOptionPane.showMessageDialog(null, "Width value is less the 90n , this is not allowed by this technology .");
					return "90n" ;
				}
				else
				{
					return width.getValue().toString()+"n";
				}
				//return width.getValue().toString()+(String)width_unit.getSelectedItem();
			}
			String get_capacitance()
			{
				return capacitance.getValue().toString();
				//return capacitance.getValue().toString()+(String)capacitance_unit.getSelectedItem();
			}
			public void actionPerformed(ActionEvent e )
			{
				if(e.getSource() == ok )
				{
					System.out.println("HI ok button is pressed ");
					 if ( comp_node[node_index].img_no  == 4 ) // INPUT
					{
						if ( comp_node[node_index].comp_no == 1 ) // IN1 
						{
							
							 MinVolt1 = minVoltage.getValue().toString()+" ";
							 MaxVolt1 = maxVoltage.getValue().toString()+" ";
							 RiseTime1 = riseTime.getValue().toString()+"n";
							 FallTime1 = fallTime.getValue().toString()+"n";
							 StepSize1 = stepSize.getValue().toString()+"n";
							 TotalTime1 = totalTime.getValue().toString()+"n";
		
							
						}
						else if ( comp_node[node_index].comp_no == 2 )  // IN2 
						{
							 MinVolt2 = minVoltage.getValue().toString()+" ";
							 MaxVolt2 = maxVoltage.getValue().toString()+" ";
							 RiseTime2 = riseTime.getValue().toString()+"n";
							 FallTime2 = fallTime.getValue().toString()+"n";
							 StepSize2 = stepSize.getValue().toString()+"n";
							 TotalTime2 = totalTime.getValue().toString()+"n";
		
						}
						else if ( comp_node[node_index].comp_no == 3 ) // CLK
						{
							 MinVolt3 = minVoltage.getValue().toString()+" ";
							 MaxVolt3 = maxVoltage.getValue().toString()+" ";
							 RiseTime3 = riseTime.getValue().toString()+"n";
							 FallTime3 = fallTime.getValue().toString()+"n";
							 StepSize3 = stepSize.getValue().toString()+"n";
							 TotalTime3 = totalTime.getValue().toString()+"n";
		
						}
					
					}
					setVisible(false);
					workPanel.repaint();
				}
				if(e.getSource() == del )
				{
					System.out.println("HI  del is pressed ");
				//	System.out.println(node_index);
					comp_node[node_index].del = true;
					comp_count[comp_node[node_index].img_no] -= 1; // for descrising the count to check no of each comp
					int i , j ;

					comp_node[node_index].remove_mat();
				/*	for ( i = comp_node[node_index].node_x ; i < comp_node[node_index].node_x + work_img_height ; i ++ )
					{
						for ( j = comp_node[node_index].node_y ; j < comp_node[node_index].node_y + work_img_width ; j ++ )
						{
							work_mat[i][j] = -1 ;
						}
					}*/
					// updating values of comp in file -------------------------------
					if ( comp_node[node_index].img_no  == 1 ) //PMOS
					{
					//	Pmos_l = Pmos_w = null ;
					}
					else if ( comp_node[node_index].img_no  == 7 ) //NMOS
					{
					//	Nmos_l = Nmos_w = null ;
					}
					else if ( comp_node[node_index].img_no  == 8 ) //Capacitor 
					{
					//	Capacitance = null;
					}
					setVisible(false);
//					work_panel_repaint();
					workPanel.repaint();
				}
				if(e.getSource() == rotate )
				{
					int i , j ;
					int t1 = comp_node[node_index].height ;
					if ( comp_node[node_index].width > t1 )
					{
						t1 = comp_node[node_index].width ;
					}
					
					// for boundary check , comp check , wire check ,  if rotated (by adding heights bec that could be maxima )
					for ( i = comp_node[node_index].node_x - t1 ; i < comp_node[node_index].node_x + t1 ; i++ ) 
					{
						for ( j = comp_node[node_index].node_y - t1 ; j < comp_node[node_index].node_y + t1 ; j++ )
						{
							if(i <= 20 || j <= 20||i >= work_panel_width || j >= work_panel_height || ( work_mat[i][j] != -1 && work_mat[i][j] != node_index) ||  wire_mat[i][j] != -1 ) 
							{
								return;
							}
						}	
					}
			

					comp_node[node_index].rotate(node_index);
					workPanel.repaint();
//					System.out.println("Roate");
//					System.out.println(comp_node[node_index].angle);
				}
			}

			class WA extends WindowAdapter
			{
				public void windowClosing( WindowEvent ev)
				{
					setVisible(false);
				}
			}
		}
		public  class WorkPanel extends JPanel  implements  MouseMotionListener , MouseListener   
		{
			public WorkPanel()
			{
				Arrays.fill(comp_count , 0);

				//	JPanel Panel = new JPanel();
				//	Panel.setBackground(Color.white);
				//	Panel.setBorder(BorderFactory.createRaisedBevelBorder());
				addMouseMotionListener(this); // whole panel is made to detect 
				addMouseListener(this); // whole panel is made to detect 

				//	work_panel_width = Panel.getWidth() ;
				//	work_panel_height = Panel.getHeight() ;

				work_mat = new int[work_panel_width][work_panel_height];
				end_points_mat = new int[work_panel_width][work_panel_height];
				wire_mat = new int[work_panel_width][work_panel_height];
				wire_points_mat = new int[work_panel_width][work_panel_height];
				int i , j ;
				for ( i = 0 ; i < work_panel_width ; i++)
				{
					for ( j = 0 ; j < work_panel_height ; j++ )
					{
						work_mat[i][j] = -1 ;
						end_points_mat[i][j] = -1 ;
						wire_mat[i][j] = -1 ;
						wire_points_mat[i][j] = -1 ;
					}
				}

			}
			public void mouseMoved(MouseEvent me) 
			{ 
				work_x = me.getX();
				work_y = me.getY();
				if ( img_button_pressed == 3 && wire_button == 1 ) 
				{
				//	System.out.println("in");
				//	System.out.println(total_wire);

				// for making good and accurate wire point around end points 
					int x = ( work_x % grid_size/2 ) > grid_size/4 ? (work_x / grid_size ) * grid_size + grid_size : (work_x / grid_size ) * grid_size; 
				
					int y = ( work_y % grid_size/2 ) > grid_size/4 ? (work_y/grid_size)*grid_size+grid_size : (work_y/ grid_size)* grid_size; 
	
					wire[total_wire-1 ].update2(x , y);
//					wire[total_wire-1 ].update2((work_x/20)*20 , (work_y/20)*20);
					repaint();
				}
			} 
			public void mouseDragged(MouseEvent me)
			{
				int i , j;
				work_x = me.getX();
				work_y = me.getY();
				
				if ( wire_drag != -1 )
				{
					if( wire_drag_end == 1 )		// if first end is draged
					{
						wire[total_wire-1 ].update1((work_x/grid_size)*grid_size , (work_y/grid_size)*grid_size);
					}
					else
					{
						wire[total_wire-1 ].update2((work_x/grid_size)*grid_size , (work_y/grid_size)*grid_size);
						
					}
					repaint();
				}
				else 
				{
					if ( total_comp > 0 )
					{
						
					/*	for ( i = comp_node[total_comp-1].node_x ;  ;)
						{
							if ( comp_node[total_comp-1].virtual_w > 0 && i >= comp_node[total_comp-1].node_x + comp_node[total_comp-1].virtual_w  ){break;}
							else if( comp_node[total_comp-1].virtual_w < 0 && i <= comp_node[total_comp-1].node_x + comp_node[total_comp-1].virtual_w  ){break;}

							for ( j = comp_node[total_comp-1].node_y ;  ;  )
							{
								if ( comp_node[total_comp-1].virtual_h > 0 && j >= comp_node[total_comp-1].node_y + comp_node[total_comp-1].virtual_h  ){break;}
								else if( comp_node[total_comp-1].virtual_h < 0 && j <= comp_node[total_comp-1].node_y + comp_node[total_comp-1].virtual_h  ){break;}
							
								if(i <= 20 || j <= 20||i >= work_panel_width || j >= work_panel_height || (work_mat[i][j] != -1 && work_mat[i][j] != node_drag))
								{
									return;
								}
							if ( comp_node[total_comp-1].virtual_h > 0 ){j++;}else{j--;} 
							}

							if ( comp_node[total_comp-1].virtual_w > 0 ){i++;}else{i--;} 
						}*/


						for ( i = work_x -30; i < work_x + comp_node[node_drag].width +30; i++ ) 
						{
							for ( j = work_y -30 ; j < work_y + comp_node[node_drag].height+30 ; j++ )
							{
								//System.out.print("comp_node[total_comp-1].height");
								//System.out.println(comp_node[total_comp-1].height);
								if(i <= 20 || j <= 20||i >= work_panel_width || j >= work_panel_height || (work_mat[i][j] != -1 && work_mat[i][j] != node_drag))
								{
								//	System.out.println(j);
									return;
								}
							}	
						}
					// for boundary check even if rotated (by adding heights bec that could be maxima )
			/*		int t1 = comp_node[total_comp-1].height ;
					if ( comp_node[total_comp-1].width > t1 )
					{
						t1 = comp_node[total_comp-1].width ;
					}
					
					for ( i = work_x - t1 ; i < work_x + t1 ; i++ ) 
					{
						for ( j = work_y - t1 ; j < work_y + t1 ; j++ )
						{
							if(i <= 20 || j <= 20 || i >= work_panel_width || j >= work_panel_height)
							{
								return;
							}
						}	
					}
			*/		
						/*for ( i = work_x ; i < work_x + comp_node[total_comp-1].width ; i++ )
						{
							for ( j = work_y ; j < work_y + comp_node[total_comp-1].height ; j++ )
							{
								if((i >= work_panel_width || j >= work_panel_height || (work_mat[i][j] != -1 && work_mat[i][j] != node_drag) ))
								{
									return;
								}
							}	
						}*/
					}
					if (node_drag != -1 )
					{
						comp_node[node_drag].remove_mat();
	
						comp_node[node_drag].node_x  = (work_x / grid_size )*grid_size ;
						comp_node[node_drag].node_y  = ( work_y / grid_size )* grid_size ;
	
						comp_node[node_drag].update_mat(node_drag);
				//	System.out.println(node_drag ) ;
					}
				}

				repaint();
			}
			public void mouseClicked(MouseEvent me) 
			{
				int i , j ;
				work_x = me.getX();
				work_y = me.getY();
				
				if ( img_button_pressed == -1 ) // for selecting anything on work panel
				{
					if ( wire_mat[work_x][work_y] != -1 )
					{
						System.out.println("wire_mat[work_x][work_y]");
						System.out.println(wire_mat[work_x][work_y]);
						JFrame wire_f = new JFrame();
						int n = JOptionPane.showConfirmDialog( wire_f, "Do u want to Delete Wire ?","Wire", JOptionPane.YES_NO_OPTION);
						if ( n == 0 )
						{
						//	System.out.println("Deletded ");
							wire[wire_mat[work_x][work_y]].del();
							repaint();
						}
						else
						{
						//	System.out.println("Not Deletded ");
						}

					}
					else if ( work_mat[work_x][work_y]!= -1 ) // there is a comp on (work_x , work_y) here temp rep inder of comp_nodearray
					{
					/*	int temp = work_mat[work_x][work_y] ; 
						int temp1 = comp_node[temp].img_no ; // temp is no img no 
						if (  temp1 == 1 || temp1 == 7 || temp1 == 8 || temp1 == 2 ||  temp1 == 9  ||(  temp1 == 4 && (comp_node[temp].comp_no == 1 || comp_node[temp].comp_no == 2  )))
						{
							//JOptionPane.showMessageDialog(null, "Eggs are not supposed to be green.");
							
							if ( dialog[temp] == null )
							{
							//	System.out.println("HI");
							//	System.out.println(temp);
								fr[temp] = new JFrame(); // bec work_mat will store the index of that comp in mat
								dialog[temp] = new myDialog( fr[temp] ,comp_str[temp1] , temp);
							}
							dialog[temp].setVisible(true);
						}*/
	/*					else if (  temp1 == 10 )
						{
							JFrame in_output_f = new JFrame();
							int n = JOptionPane.showConfirmDialog( in_output_f, "Do u want to Delete this comp ?","in_out", JOptionPane.YES_NO_OPTION);
							if ( n == 0 )
							{
								//		System.out.println("Deletded ");
								comp_node[temp].del() ;
								comp_node[temp].update_mat(-1);
								comp_count[temp1] = 0 ;
								repaint();
							}
							else
							{
							//	System.out.println("Not Deletded ");
							}
	
						}
			*/		//	else if (  temp != -1 )
						{
							JOptionPane.showMessageDialog(null, "You can't change value of this component !! :)");
						}
					}


				}
				else if (img_button_pressed == 3) // i.e line is selected 
				{
				//	int x = (work_x % 10)>5 ? (work_x/20)*20+20 : (work_x/20)*20; // for making good 
				//	int y = (work_y % 10)>5 ? (work_y/20)*20+20 : (work_y/20)*20; // accurate wire point around end points 
					int x = ( work_x % grid_size/2 ) > grid_size/4 ? (work_x / grid_size ) * grid_size + grid_size : (work_x / grid_size ) * grid_size; // for making good 
				
					int y = ( work_y % grid_size/2 ) > grid_size/4 ? (work_y/grid_size)*grid_size+grid_size : (work_y/ grid_size)* grid_size; // accurate wire point around end points
					
					if ( wire_button == 0 ) // button is pressed first time 
					{	
						if ( end_points_mat[work_x][work_y] != - 1 ) // if end points r there 
						{
							
						//        wire[total_wire++] = new line((work_x /20)*20, (work_y/20)*20 , (work_x/20)*20 , (work_y/20)*20);
							wire[total_wire++] = new line(x,y , x, y);
							repaint();
							wire_button = 1 ;
						}
						else
						{
						     JOptionPane.showMessageDialog(null, "Wire could start OR end at the componet's connection points only ");
						}
					}
					else
					{
							
						if ( end_points_mat[work_x][work_y] != - 1 ) // if end points r there 
						{
						//	wire[total_wire - 1].update2((work_x/20)*20 , (work_y/20)*20); // -1 bec inder of first wire is 0 
							wire[total_wire - 1].update2(x , y ); // -1 bec inder of first wire is 0 
							repaint();

							wire[total_wire - 1 ].update_mat(total_wire - 1); // 

							img_button_pressed = -1 ;
							change_selected(0);
							wire_button = 0 ;
							System.out.println("Hi I am in want to leave :)");
						}
						else
						{	// adding more end points 
							wire[total_wire - 1].update(x , y ); // -1 bec inder of first wire is 0 
							repaint();
							System.out.println("wire[total_wire-1].end_index");
							System.out.println(wire[total_wire-1].end_index);
						}
					}
				/*	if ( end_points_mat[work_x][work_y] != - 1 ) // if end points r there 
					{
					int x = (work_x % 10)>5 ? (work_x/20)*20+20 : (work_x/20)*20;
					int y = (work_y % 10)>5 ? (work_y/20)*20+20 : (work_y/20)*20;
					if ( wire_button == 0 ) // button is pressed first time 
					{
						//	wire[total_wire++] = new line((work_x /20)*20, (work_y/20)*20 , (work_x/20)*20 , (work_y/20)*20);
					wire[total_wire++] = new line(x,y , x, y);
					repaint();
					wire_button = 1 ;
				}

						System.out.println(" end_points_mat[work_x][work_y] " ); 
						System.out.println( end_points_mat[work_x][work_y]  ); 

						int x = (work_x % 10)>5 ? (work_x/20)*20+20 : (work_x/20)*20;
						int y = (work_y % 10)>5 ? (work_y/20)*20+20 : (work_y/20)*20;
						if ( wire_button == 0 ) // button is pressed first time 
						{
						//	wire[total_wire++] = new line((work_x /20)*20, (work_y/20)*20 , (work_x/20)*20 , (work_y/20)*20);
							wire[total_wire++] = new line(x,y , x, y);
							repaint();
							wire_button = 1 ;
						}
						else
						{
						//	wire[total_wire - 1].update2((work_x/20)*20 , (work_y/20)*20); // -1 bec inder of first wire is 0 
							wire[total_wire - 1].update2(x , y ); // -1 bec inder of first wire is 0 
							repaint();
	
							img_button_pressed = -1 ;
							change_selected(0);
							wire_button = 0 ;
						}
					}
					else 
					{
						JOptionPane.showMessageDialog(null, "Wire could start / end at the componet's connection points only ");
					}
*/
				}
				else  // For adding comp 
				{
					if ( img_button_pressed != -1  )
					{
						draw_work = 1;
						//				System.out.println("draw_work set to 1 ");
					}

					// creating the node for printing each comp 
					if ( img_button_pressed == 5) // 2Input MUX
					{
						comp_node[total_comp] = new node((work_x / grid_size)*grid_size , (work_y / grid_size )*grid_size , img_button_pressed , grid_size * 4 , 6 * grid_size , comp_count[5]+1);
					}	
					else if (  img_button_pressed == 11 ) // Latch
					{
						comp_node[total_comp] = new node((work_x / grid_size)*grid_size , (work_y / grid_size )*grid_size , img_button_pressed , grid_size * 4, 6*grid_size , comp_count[11] + 1);
					}
					else if ( img_button_pressed == 1) // pmos 
					{
						comp_node[total_comp] = new node((work_x / grid_size)*grid_size , (work_y / grid_size )*grid_size , img_button_pressed , grid_size * 2 , 4 * grid_size , comp_count[1]+1);
					}
					else if ( img_button_pressed == 7) //  nmos 
					{
						comp_node[total_comp] = new node((work_x / grid_size)*grid_size , (work_y / grid_size )*grid_size , img_button_pressed , grid_size * 2 , 4 * grid_size , comp_count[7]+1);
					}
					else if ( img_button_pressed == 2) // ground  
					{
						comp_node[total_comp] = new node((work_x / grid_size)*grid_size , (work_y / grid_size )*grid_size , img_button_pressed , grid_size * 2 , 2 * grid_size , 1);
					}
					else if ( img_button_pressed == 8  ) // capicitor  
					{
						comp_node[total_comp] = new node((work_x / grid_size)*grid_size , (work_y / grid_size )*grid_size , img_button_pressed , grid_size * 3, 2 * grid_size , 1);
					}
					else if (  img_button_pressed == 9 ) // Vdd
					{
						comp_node[total_comp] = new node((work_x / grid_size)*grid_size , (work_y / grid_size )*grid_size , img_button_pressed , grid_size * 2, 3 * grid_size , 1);
					}
					else if (   img_button_pressed == 10 ) //  Output
					{
						comp_node[total_comp] = new node((work_x / grid_size)*grid_size , (work_y / grid_size )*grid_size , img_button_pressed , grid_size * 2, grid_size ,1 );
					}
					else if (  img_button_pressed == 4 ) // Input 
					{
						comp_node[total_comp] = new node((work_x / grid_size)*grid_size , (work_y / grid_size )*grid_size , img_button_pressed , grid_size * 2, grid_size , comp_count[4] + 1);
					}
					else
					{
						comp_node[total_comp] = new node((work_x / grid_size)*grid_size , (work_y / grid_size )*grid_size , img_button_pressed , grid_size * 3, 2 * grid_size , 1);
					}
					System.out.println("img_button_pressed");
					System.out.println(img_button_pressed);


					// if the surrounding have some object -------- -30
					
					for ( i = work_x -30; i < work_x + comp_node[total_comp].width +30; i++ ) 
					{
						for ( j = work_y -30 ; j < work_y + comp_node[total_comp].height+30 ; j++ )
						{
							if(i <= 20 || j <= 20||i >= work_panel_width || j >= work_panel_height || work_mat[i][j] != -1 )
							{
								return;
							}
						}	
					}

			/*		int t1 = comp_node[total_comp].height ;
					if ( comp_node[total_comp].width > t1 )
					{
						t1 = comp_node[total_comp].width ;
					}
					
					// for boundary check even if rotated (by adding heights bec that could be maxima )
					for ( i = work_x - t1 ; i < work_x + t1 ; i++ ) 
					{
						for ( j = work_y - t1 ; j < work_y + t1 ; j++ )
						{
							if(i <= 20 || j <= 20 || i >= work_panel_width || j >= work_panel_height)
							{
								return;
							}
						}	
					}
			*/		//--------------------------------------------------------------------
					// updating the matrix 
					comp_node[total_comp].update_mat(total_comp);
				/*	for ( i = work_x ; i < work_x + comp_node[total_comp].width ; i++ )
					{
						for ( j = work_y ; j < work_y + comp_node[total_comp].height ; j++ )
						{
							work_mat[i][j] = total_comp  ;   // update the matrix (as total comp is already increased)
						}

					}*/
					comp_count[img_button_pressed]++ ;
					total_comp++;

					//	System.out.println(work_x );
					//		for( i = 0 ; i < 12 ; i ++ )
					//		{	
					//			System.out.println(comp_count[i]);
					//		}

					repaint();
					img_button_pressed = -1 ;
					draw_work = 0 ;

					change_selected(0);
				}
			}
			public void mouseReleased(MouseEvent me) 
			{
				int i , j ;
				if ( wire_drag != -1 )
				{
					wire[wire_drag].update_mat(wire_drag); // updating the matrix
					wire_drag = -1;   // node is unseledted to drag
				}
				else if ( node_drag != -1 )
				{
					comp_node[node_drag].update_mat(node_drag); // updating the matrix
				/*	for ( i = comp_node[node_drag].node_x ; i < comp_node[node_drag].node_x + comp_node[node_drag].width ; i++ )
					{
						for ( j = comp_node[node_drag].node_y ; j < comp_node[node_drag].node_y + comp_node[node_drag].height ; j++ )
						{
							work_mat[i][j] =  node_drag ;   // update the matrix 
						}
					}*/
					node_drag = -1;   // node is unseledted to drag
				}
				
			}
			public void mouseEntered(MouseEvent me) 
			{
			}
			public void mouseExited(MouseEvent me) 
			{
			}
			public void mousePressed(MouseEvent me) 
			{
				int i , j ;
				work_x = me.getX();
				work_y = me.getY();
				System.out.println( work_mat[work_x][work_y]  );
				if ( wire_points_mat[work_x][work_y] != -1 )
				{
					wire_drag = wire_points_mat[work_x][work_y] ;
					wire[wire_points_mat[work_x][work_y]].update_mat(-1);
					// checking wich end is selected 
					wire_drag_end = 1 ;
					System.out.println("wire_drag");
					System.out.println(wire_drag);
					for ( i = work_x - 10 ; i < work_x + 11 ; i++ )
					{
						if ( i == wire[wire_drag].x2 )
						{
							wire_drag_end = 2 ;
						}
					}
				}
				else if ( work_mat[work_x][work_y] != -1 )
				{
					node_drag = work_mat[work_x][work_y];   // node is selected for drag

					comp_node[node_drag].remove_mat(); 		   // update the matrix as the img is selected , so can be moved 


				/*	for ( i = comp_node[node_drag].node_x ; i < comp_node[node_drag].node_x + comp_node[node_drag].width ; i++ )
					{
						for ( j = comp_node[node_drag].node_y ; j < comp_node[node_drag].node_y + comp_node[node_drag].height ; j++ )
						{
							work_mat[i][j] =  -1 ;   // update the matrix as the img is selected , so can be moved 
						}
					}

				*/
					//					System.out.println("hi ");
					//					System.out.println(node_drag);
				}
			}
			public void paint(Graphics g) 
			{
				int i , j ;
				Graphics2D g2d = (Graphics2D)g;
				g2d.scale(scale_x , scale_y);
				// back ground ----------------
				g2d.setColor(Color.black);
				g.fillRect(0,0,work_panel_width+500 , work_panel_height+500);
				g2d.setColor(Color.white);
				g2d.setStroke(new BasicStroke(1));
				for ( i = 0 ; i < work_panel_width +400; i+=grid_size)
				{
					for ( j = 0 ; j < work_panel_height+200 ; j+=grid_size )
					{
						g2d.drawOval(  i -1,j-1 , 0 , 0);
					}
				}

			//	draw_2input_mux(g2d , 100 , 100 , grid_size , 0 ) ;
			//	draw_inverter(g2d , 400 , 400 , grid_size , 0 ) ;
			

		//For Images --------------------------------
				
				for ( i = 0; i < total_comp ; i++ )
				{
					if ( comp_node[i].del != true )
					{
						if ( comp_node[i].img_no == 1)
						{
							draw_cmos(g2d , comp_node[i].node_x  , comp_node[i].node_y , grid_size , comp_node[i].angle);
							g.setColor(Color.yellow);
							g.drawString(comp_str[1] + comp_node[i].comp_no, comp_node[i].node_x -10 , comp_node[i].node_y + 10 );
						}
						else if ( comp_node[i].img_no == 5) // 2Input MUX 
						{
							draw_2input_mux(g2d , comp_node[i].node_x  , comp_node[i].node_y , grid_size , comp_node[i].angle);
							g.setColor(Color.yellow);
						//	g.drawString(comp_str[5] + comp_node[i].comp_no, comp_node[i].node_x -10 , comp_node[i].node_y + 10 );
						}
						else if ( comp_node[i].img_no == 11) // Latch
						{
							draw_latch(g2d , comp_node[i].node_x  , comp_node[i].node_y , grid_size , comp_node[i].angle);
							g.setColor(Color.yellow);
							g.drawString(comp_str[11] + comp_node[i].comp_no, comp_node[i].node_x -10 , comp_node[i].node_y -grid_size/2 );
						}
						else if ( comp_node[i].img_no == 7)
						{
							draw_nmos(g2d , comp_node[i].node_x  , comp_node[i].node_y , grid_size , comp_node[i].angle);
							g.setColor(Color.yellow);
							g.drawString(comp_str[7]+  comp_node[i].comp_no,comp_node[i].node_x + -10 , comp_node[i].node_y + 10 );
			
				//			g.setColor(Color.blue);
				//			g.fillOval( comp_node[i].end_pointsX[0] - 4, comp_node[i].end_pointsY[0]  -4, 8 ,8 );
				///			g.fillOval( comp_node[i].end_pointsX[1] - 4, comp_node[i].end_pointsY[1]  -4, 8 ,8 );
				//			g.fillOval( comp_node[i].end_pointsX[2] - 4, comp_node[i].end_pointsY[2]  -4, 8 ,8 );
				//			g.setColor(Color.black);
						}
						else if ( comp_node[i].img_no == 2)
						{
							draw_ground(g2d , comp_node[i].node_x  , comp_node[i].node_y , 20, comp_node[i].angle);
						//	g.setColor(Color.yellow);
						//	g.drawString(comp_str[2] , comp_node[i].node_x + 50 , comp_node[i].node_y + 50 );
						}
						else if ( comp_node[i].img_no == 8)
						{
							draw_capacitor(g2d , comp_node[i].node_x  , comp_node[i].node_y , grid_size, comp_node[i].angle);
							g.setColor(Color.yellow);
							g.drawString(comp_str[8] + comp_node[i].comp_no, comp_node[i].node_x + 22 , comp_node[i].node_y  );
				//			g.setColor(Color.blue);
				//			g.fillOval( comp_node[i].end_pointsX[0] - 4, comp_node[i].end_pointsY[0]  -4, 8 ,8 );
				//			g.fillOval( comp_node[i].end_pointsX[1] - 4, comp_node[i].end_pointsY[1]  -4, 8 ,8 );
				//			g.setColor(Color.black);
						}
						else if ( comp_node[i].img_no == 9)
						{
							draw_vdd(g2d , comp_node[i].node_x  , comp_node[i].node_y , grid_size, comp_node[i].angle);
							g.setColor(Color.yellow);
							g.drawString(comp_str[9] , comp_node[i].node_x + 30 , comp_node[i].node_y + 10 );
						}
						else if ( comp_node[i].img_no == 4 )
						{
							draw_input(g2d , comp_node[i].node_x  , comp_node[i].node_y , grid_size, comp_node[i].angle ,  comp_node[i].comp_no); // here is one extra param (last one) to tell the comp_no of that input
						//	g.setColor(Color.blue);
						//	g.fillOval( comp_node[i].end_pointsX[0] - 4, comp_node[i].end_pointsY[0]  -4, 8 ,8 );
						//	g.setColor(Color.green);
						//	g.fillOval( comp_node[i].node_x - 4, comp_node[i].node_y  -4, 8 ,8 );
				
						}
						else if ( comp_node[i].img_no == 10 )
						{
							draw_output(g2d , comp_node[i].node_x  , comp_node[i].node_y , grid_size, comp_node[i].angle);
					//		g.setColor(Color.blue);
					//		g.fillOval( comp_node[i].end_pointsX[0] - 4, comp_node[i].end_pointsY[0]  -4, 8 ,8 );
					//		g.setColor(Color.green);
					//		g.fillOval( comp_node[i].node_x - 4, comp_node[i].node_y  -4, 8 ,8 );
				
						}
						else 
						{
						g2d.drawImage(img[comp_node[i].img_no] , comp_node[i].node_x ,comp_node[i].node_y, work_img_width , work_img_height,  this);
						}
					}
				}

				// For Wires ------------------------------------
				g2d.setStroke(new BasicStroke(2));
				for ( i = 0 ; i < total_wire ; i++ )
				{
					if ( wire[i].del == false )
					{
						g2d.setColor(Color.green);
						for ( int k = 0 ; k < wire[i].end_index ; k ++ )
						{
						//	g2d.drawLine (wire[i].x[k] , wire[i].y[k] , wire[i].x[k+1] , wire[i].y[k+1] );
							g2d.drawLine (wire[i].x[k] , wire[i].y[k] , wire[i].x[k+1] , wire[i].y[k] );
							g2d.drawLine (wire[i].x[k+1] , wire[i].y[k] , wire[i].x[k+1] , wire[i].y[k+1] );
						//	g2d.drawLine (wire[i].x1 , wire[i].y1 , wire[i].x2 , wire[i].y1 );
						//	g2d.drawLine (wire[i].x2 , wire[i].y1 , wire[i].x2 , wire[i].y2 );
						}
	
						g2d.setColor(Color.red);
						g2d.fillRect (wire[i].x1 -4  , wire[i].y1 -4 , 8 ,8);
						g2d.fillRect (wire[i].x2 - 4 , wire[i].y2 -4 , 8 ,8);
					}
				}
				/*				if ( img_button_pressed != -1 && draw_work == 1 )
								{
				//System.out.println("draw " + img_button_pressed + " on work bord ");
				g2d.drawImage(img[img_button_pressed] , work_x , work_y , work_img_width , work_img_height,  this );
				g2d.setColor(Color.green);
				g2d.drawRect( work_x , work_y , work_img_width , work_img_height);
				g2d.setColor(Color.black);
				g2d.setStroke(new BasicStroke(5));
				g2d.drawOval( work_x  ,work_y + work_img_height / 2 , 5 , 5);
				g2d.drawOval( work_x + work_img_width  ,work_y + work_img_height / 2 , 5 , 5);
				img_button_pressed = -1 ;
				draw_work = 0 ;
				}
				else if ( img_button_pressed == 3  )
				{
				g2d.setStroke(new BasicStroke(2));
				g2d.drawLine( line_x +1 ,line_y +1 , work_x  , work_y );
				img_button_pressed = -1 ;
				draw_work = 0 ;
				line_x = line_y = -1 ;
				}
				 */
				//	g.setColor(Color.white);
				//	g.fillRect(0,0,200,200);
				//	g.setColor(Color.blue);
				//	g.drawString("("+work_x+","+work_y+")",work_x,work_y); 
			}
			
			void draw_latch( Graphics2D  g , int x , int y , int width , double angle )
			{
				g.rotate(angle , x , y);
				g.setColor(Color.blue);
				g.setStroke(new BasicStroke(2));				
							
				g.drawLine(x + 2* width , y , x + 2* width , y + width );
				g.drawLine(x  , y + 3* width, x +  width , y + 3*width);
				g.drawLine(x +3*width , y + 3* width, x +  4*width , y + 3*width);
				
				g.drawRect(x + width , y + width , 2*width , 4*width);	
				
				g.setColor(Color.red);
				g.fillRect( x  -4 + 2 * width , y  -4, 8 ,8 );
				g.fillRect( x  -4             , y - 4 + 3* width , 8 ,8 );
				g.fillRect( x  -4 + 4 * width , y - 4 + 3* width , 8 ,8 );


				g.setColor(Color.yellow);
				g.drawString("1 * 1", x + 5 +width   , y +2*width );
				g.drawString("I/O", x + 10 +width   , y +3*width );
				g.drawString("Latch", x + 1 + width   , y +  4*width );
				
				
				g.rotate(-angle , x , y);

			}
			void draw_2input_mux( Graphics2D  g , int x , int y , int width , double angle )
			{
				g.rotate(angle , x , y);
				g.setColor(Color.blue);
				g.setStroke(new BasicStroke(2));				
							
				g.drawLine(x + 2* width , y , x + 2* width , y + width );
				g.drawLine(x  , y + 2* width, x +  width , y + 2*width);
				g.drawLine(x  , y + 4* width, x +  width , y + 4*width);
				g.drawLine(x +3*width , y + 3* width, x +  4*width , y + 3*width);
				g.drawRect(x + width , y + width , 2*width , 4*width);	
				
				g.setColor(Color.red);
				g.fillRect( x  -4 + 2 * width , y  -4, 8 ,8 );
				g.fillRect( x  -4             , y - 4 + 2* width , 8 ,8 );
				g.fillRect( x  -4             , y - 4 + 4* width , 8 ,8 );
				g.fillRect( x  -4 + 4 * width , y - 4 + 3* width , 8 ,8 );


				g.setColor(Color.yellow);
				g.drawString("2 * 1", x + 5 +width   , y +2*width );
				g.drawString("I/O", x + 10 +width   , y +3*width );
				g.drawString("MUX", x + 5+ width   , y +  4*width );
				
				
				g.rotate(-angle , x , y);

			}
			void draw_inverter(Graphics2D g , int x , int y , int width , double angle)
			{
				g.rotate(angle , x , y);
				g.setColor(Color.yellow);
//				g.drawRect( x , y , 3*width , 2*width);

				g.setColor(Color.blue);
				g.setStroke(new BasicStroke(2));
				g.drawLine(x  , y + width , x + width ,y + width);
				g.drawLine(x  +2*width, y + width , x + 3*width ,y + width);

				g.drawLine(x  +width, y  , x +width ,y + 2*width);
				g.drawLine(x  +width, y  , x +2*width ,y + width);
				g.drawLine(x  +width, y +2*width , x + 2*width ,y + width);
				g.fillOval( x + 2*width - 5, y + width - 5, 10,10 );
				g.setStroke(new BasicStroke(1));
				// end points 
				g.setColor(Color.red);
				g.fillRect( x - 4, y + width -4, 8 ,8 );
				g.fillRect( x + 3*width -4, y +width - 4 , 8 ,8 );
				g.rotate(-angle , x , y);

			}
			void draw_mux(Graphics2D g , int x , int y , int width , double angle )
			{
				g.rotate(angle , x , y);
				g.setColor(Color.yellow);
				g.setStroke(new BasicStroke(2));
				g.drawRect(x + width , y + width , 4*width , 6*width);	

				g.setColor(Color.blue);
				g.drawOval( x + 3*width - 3, y + 2*width - 8, 6,6 );
				
				
							
				g.drawLine(x + 3* width , y , x + 3* width , y + 2*width - 8);
				g.drawLine(x + 3* width , y + 6*width, x + 3* width , y + 8*width);
				
				g.drawLine(x  , y + 4* width, x + 2* width , y + 4*width);
				g.drawLine(x + 4* width , y + 4*width, x + 6* width , y + 4*width);
				
				g.drawLine(x + 2* width - 8 , y + 2*width + 8 , x + 4* width +8 , y + 2*width + 8 );
				g.drawLine(x + 2* width - 8 , y + 2*width ,x + 4* width +8 , y + 2*width  );

			g.drawLine(x + 2* width - 8 , y + 6*width - 8 , x + 4* width +8 , y + 6*width - 8 );
				g.drawLine(x + 2* width - 8 , y + 6*width ,x + 4* width +8 , y + 6*width  );
				
				g.drawLine(x + 2*width ,  y + 2*width +8 , x+ 2*width , y+ 6*width-8);	
				g.drawLine(x + 4*width ,  y + 2*width +8 , x+ 4*width , y+ 6*width-8);	
//				g.drawRect(x + 2*width ,  y + 2*width +8 , 2*width , 4*width -16);	
				
				g.setColor(Color.red);
				g.fillRect( x - 4 + 3 * width , y  -4, 8 ,8 );
				g.fillRect( x - 4 + 3 * width , y + 8* width  -4, 8 ,8 );
				g.fillRect( x  -4, y - 4 + 4* width , 8 ,8 );
				g.fillRect( x + 6 * width  -4 , y - 4 + 4* width , 8 ,8 );

			}
			void draw_nmos(Graphics2D g , int x , int y , int width , double angle )
			{

					
				g.rotate(angle , x , y);
			//	g.translate(x,y);
			//	g.scale(.75,.75);
			//	g.translate(-x,-y);
//				System.out.println(angle);
				g.setColor(Color.yellow);
//				g.drawRect( x , y , 2*width , 4*width);

				g.setStroke(new BasicStroke(2));
				g.setColor(Color.blue);
				g.drawLine(x  , y + 2*width , x + width , y + 2*width);
				
				g.drawLine(x + width , y + width/4 +width, x +  width , y +(7* width)/4 +width);
				g.drawLine(x + width +width/4 , y + width/4 +width, x +  width +width/4, y +(7* width)/4 +width);

				g.drawLine(x + (5*width)/4 , y + width/2+width, x + 2* width , y + width/2+width );
				g.drawLine(x + (5*width)/4 , y +(3* width)/2+width, x +  2*width , y +(3* width)/2+width);

				g.drawLine(x + 2*width , y , x + 2*width , y + (3* width)/2);
				g.drawLine(x + 2*width , y + 4*width , x + 2*width , y + (5* width)/2);

				g.setStroke(new BasicStroke(1));
				// end points 
				g.setColor(Color.red);
				g.fillRect( x - 4, y + 2*width -4, 8 ,8 );
				g.fillRect( x + 2*width -4, y - 4 , 8 ,8 );
				g.fillRect( x + 2*width -4, y +4 * width - 4 , 8 ,8 );

				g.setColor(Color.black);
			//	g.translate(x,y);
			//	g.scale(1.33,1.33);
			//	g.translate(-x,-y);
				g.rotate(-angle , x , y);
			}
			void draw_cmos(Graphics2D g , int x , int y , int width , double angle)
			{
					
				g.rotate(angle , x , y);
				g.setColor(Color.yellow);
//				g.drawRect( x , y , 2*width , 4*width);

				g.setColor(Color.blue);
				g.drawOval( x + width - 6, y + 2*width - 3, 6,6 );
				g.setStroke(new BasicStroke(2));
				g.drawLine(x  , y + 2*width , x + width - 6,y + 2*width);
				
				g.drawLine(x + width , y + width/4 +width, x +  width , y +(7* width)/4 +width);
				g.drawLine(x + width +width/4 , y + width/4 +width, x +  width +width/4, y +(7* width)/4 +width);

				g.drawLine(x + (5*width)/4 , y + width/2+width, x + 2* width , y + width/2+width );
				g.drawLine(x + (5*width)/4 , y +(3* width)/2+width, x +  2*width , y +(3* width)/2+width);

				g.drawLine(x + 2*width , y , x + 2*width , y + (3* width)/2);
				g.drawLine(x + 2*width , y + 4*width , x + 2*width , y + (5* width)/2);

				g.setStroke(new BasicStroke(1));
				// end points 
				g.setColor(Color.red);
				g.fillRect( x - 4, y + 2*width -4, 8 ,8 );
				g.fillRect( x + 2*width -4, y - 4 , 8 ,8 );
				g.fillRect( x + 2*width -4, y +4 * width - 4 , 8 ,8 );

				g.setColor(Color.black);
				g.rotate(-angle , x , y);
			}
			void draw_capacitor(Graphics2D g , int x , int y , int width , double angle)
			{
				g.rotate(angle , x , y);
				g.setColor(Color.yellow);
//				g.drawRect( x , y , 3*width , 2*width);

				g.setColor(Color.blue);
				g.setStroke(new BasicStroke(2));
				g.drawLine(x   , y + width , x + (5*width)/4 ,y + width);
				g.drawLine(x +3*width  , y + width , x + (7*width)/4 ,y + width);

				g.drawLine(x +(5*width)/4  , y + width /2, x + (5*width)/4 ,y + (3*width)/2);
				g.drawLine(x +(7*width)/4  , y + width /2, x + (7*width)/4 ,y + (3*width)/2);
				g.setStroke(new BasicStroke(1));
				// end points 
				g.setColor(Color.red);
				g.fillRect( x - 4, y + width -4, 8 ,8 );
				g.fillRect( x + 3*width -4, y +width - 4 , 8 ,8 );
				g.rotate(-angle , x , y);

			}
			void draw_ground(Graphics2D g , int x , int y , int width , double angle)
			{
				g.rotate(angle , x , y);
				g.setColor(Color.yellow);
//				g.drawRect( x , y , 2*width , 2*width);

				g.setColor(Color.blue);
				g.setStroke(new BasicStroke(2));
				g.drawLine(x +width  , y  , x + width ,y + (5*width)/4);
				g.drawLine(x +width/2  , y + (5*width)/4 , x + (3*width)/2 ,y + (5*width)/4);
				g.drawLine(x +(3*width)/4  , y + (6*width)/4 , x + (5*width)/4 ,y + (6*width)/4);
				g.drawLine(x +(7*width)/8  , y + (7*width)/4 , x + (9*width)/8 ,y + (7*width)/4);
				g.setStroke(new BasicStroke(1));
				// end points 
				g.setColor(Color.red);
				g.fillRect( x +width - 4, y  -4, 8 ,8 );
				g.rotate(-angle , x , y);

			}
			void draw_vdd(Graphics2D g , int x , int y , int width , double angle)
			{
				g.rotate(angle , x , y);
				g.setColor(Color.yellow);
			//	g.drawRect( x , y , 2*width , 3*width);

				g.setColor(Color.blue);
				g.setStroke(new BasicStroke(2));
				g.drawLine(x +width  , y  , x + width ,y + 2*width);
				g.setStroke(new BasicStroke(4));
				g.drawLine(x  , y +(5*width)/2 , x + (4*width)/2 ,y + (3*width)/2);
			//	g.drawLine(x +width/2  , y + (5*width)/4 , x + (3*width)/2 ,y + (5*width)/4);
			//	g.drawLine(x +(3*width)/4  , y + (6*width)/4 , x + (5*width)/4 ,y + (6*width)/4);
				g.setStroke(new BasicStroke(1));
				// end points 
				g.setColor(Color.red);
				g.fillRect( x +width - 4, y  -4, 8 ,8 );
				g.rotate(-angle , x , y);
			}
			void draw_input(Graphics2D g , int x , int y , int width , double angle , int comp_no)
			{
				g.rotate(angle , x , y);	
				g.setColor(Color.yellow);
				if ( comp_no == 1 )
				{
					g.drawString("D" , x - 20 , y+ width - 2 );
				}
				else if ( comp_no == 2 )
				{
					g.drawString("CLK", x -30 , y+ width );
				}
				else if ( comp_no == 3 )
				{
					g.drawLine(x-30 , y + 2, x - 10 ,y + 2 );
					g.drawString("CLK", x -30 , y+ width );
				}
				else if ( comp_no == 4 )
				{
					g.drawString("CLK", x - 30 , y+ width );
				}
			/*	else if ( comp_no == 4 )
				{
					g.drawString("IN  b'", x + 5 , y+ width );
				}*/
			//	g.drawRect( x , y , 2 *width , width);

				g.setColor(new Color(255,20,147));
				g.setStroke(new BasicStroke(2));
				g.drawLine(x  , y  , x + 2*width ,y );
				g.drawLine(x  , y + width  , x + width ,y + width );
				g.drawLine(x  , y , x , y + width );
			//	g.drawLine(x + width , y , x + (3*width)/2 , y + width/2);
				g.drawLine(x + width , y + width , x + (3*width)/2 , y );
			//	g.drawLine(x + 2*width , y + width /2 , x + (3*width)/2 , y + width/2);
			//	g.drawLine(x +width/2  , y + (5*width)/4 , x + (3*width)/2 ,y + (5*width)/4);
			//	g.drawLine(x +(3*width)/4  , y + (6*width)/4 , x + (5*width)/4 ,y + (6*width)/4);
				g.setStroke(new BasicStroke(1));
				// end points 
				g.setColor(Color.red);
				g.fillRect( x + 2*width - 4, y  -4, 8 ,8 );
				g.rotate(-angle , x , y);
			}
			void draw_output(Graphics2D g , int x , int y , int width , double angle)
			{
				
				g.rotate(angle , x , y);
				g.setColor(Color.yellow);
			//	g.drawString("OUT", x  + 2* width + 2 , y+ width - 3);
				
					//g.drawLine(x + (5*width)/2 , y + 2, x +3*width ,y + 2 );
					g.drawString("Q", x +(5*width)/2 , y+ width );
			
			//	g.drawRect( x , y , 2 *width , width);

				
				g.setColor(new Color(255,20,147));
				g.setStroke(new BasicStroke(2));
				g.drawLine(x + width/2 , y  , x + (3*width)/2 ,y );
				g.drawLine(x + width/2 , y + width  , x + (3*width)/2 ,y + width );
				g.drawLine(x + width/2  , y , x + width/2 , y + width );

				g.drawLine(x + (3*width)/2 , y , x + 2*width , y + width/2);
				g.drawLine(x + (3*width)/2, y +	 width , x + 2*width , y + width/2);
			
				g.drawLine(x , y  , x + width/2 , y );
			//	g.drawLine(x +width/2  , y + (5*width)/4 , x + (3*width)/2 ,y + (5*width)/4);
			//	g.drawLine(x +(3*width)/4  , y + (6*width)/4 , x + (5*width)/4 ,y + (6*width)/4);
				g.setStroke(new BasicStroke(1));
				// end points 
				g.setColor(Color.red);
				g.fillRect( x  - 4, y -4, 8 ,8 );
				g.rotate(-angle , x , y);
			}
		}
		public class graph extends JPanel
		{
			String fileToRead = "outfile_flipflop_p";

			StringBuffer strBuff;
			TextArea txtArea;
			String myline;
			JLabel l ;
			Font f1 ;

			double[] time = new double[10000] ;
			double[] V_D = new double[10000] ;
			double[] V_clk = new double[10000] ;
			
			
			double[] V_out = new double[10000] ;
			int no_values = 0 ;
			//public  graph()
			public  graph ()
			{
				f1 = new Font("Arial",Font.BOLD,15);
			}
			public void make_graph()
			{
				if ( exp_type == 1 )
				{
					fileToRead ="outfile_flipflop_p";
				}
				else if ( exp_type == 0 )
				{
						fileToRead ="outfile_latch_p";
				}
				URL url = null;
				try
				{
					url = new URL(getCodeBase(), fileToRead);
				}
				catch(MalformedURLException e){
					System.out.println("I did't got the outfile to read :( :( So I am very said ");
				}
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
				                System.out.println(myline);			
					int i = 0 ;
					while((line = bf.readLine()) != null){
				                System.out.println(i);			
					//	line = bf.readLine();
					//	line = bf.readLine();
				                System.out.println(line);			
									time[i] = Double.parseDouble(line);
						line = bf.readLine();
						line = bf.readLine();
									V_out[i] = Double.parseDouble(line);
						line = bf.readLine();
						line = bf.readLine();
									V_D[i] = Double.parseDouble(line);
						line = bf.readLine();
						line = bf.readLine();
									V_clk[i] = Double.parseDouble(line);
						i++;
					}
					no_values = i ;

					repaint();

					//		System.out.println("Hi I am in the contrct func of the exp1_graph class :)");
				}
					catch(IOException e){
						e.printStackTrace();
					}


			}
				public void paint(Graphics g)
				{


				//	System.out.println("Hi I am in the gpaint func of the exp1_graph class :)");
					int i , j ;
					Graphics2D g2d = (Graphics2D)g ;
					g.setFont(f1);

					g2d.setStroke(new BasicStroke(2));
					// back ground 
					g2d.setColor(new Color(204 , 255 , 255));
					g2d.fillRect(0,0,1000,1500);
					g2d.setColor(Color.lightGray);
					for ( i = 0 ; i < 1500 ; i += 20 )
					{
						for (j = 0 ; j < 1500 ; j +=5 )
						{
							g2d.fillOval(i , j , 1 , 2);
						}
					}
					for ( i = 0 ; i < 1500 ; i += 5 )
					{
						for (j = 0 ; j < 1500 ; j +=20 )
						{
							g2d.fillOval(i , j , 2 , 1);
						}
					}

					// graph
					g2d.setColor(Color.blue);
					for( i = 0 ; i < no_values - 1 ; i++ )
					{
						//g2d.drawLine(40+2*i , 90-(int)Math.round(V_D[i]*70) , 40 + 2*(i+1) , 90-(int)Math.round(V_D[i+1]*70) );
						g2d.drawLine(40+2*i , 35+90-(int)Math.round(V_D[i]*70) , 40 + 2*(i+1) , 35+90-(int)Math.round(V_D[i+1]*70) );
					}
					g2d.drawString("D ",  4 , 50 +40);

					g2d.setColor(Color.blue);
					for( i = 0 ; i < no_values - 1 ; i++ )
					{
					   //g2d.drawLine(40+2*i , 200-(int)Math.round(V_clk[i]*70) , 40 + 2*(i+1) , 200-(int)Math.round(V_clk[i+1]*70) );
					   g2d.drawLine(40+2*i , 35+200-(int)Math.round(V_clk[i]*70) , 40 + 2*(i+1) , 35+200-(int)Math.round(V_clk[i+1]*70) );
					}
					g2d.drawString("Clk ",  4 , 160+40 );

				/*	g2d.setColor(Color.blue);
					for( i = 0 ; i < no_values - 1 ; i++ )
					{
					   g2d.drawLine(40+2*i , 310-(int)Math.round(V_clk[i]*70) , 40 + 2*(i+1) , 310-(int)Math.round(V_clk[i+1]*70) );
					}	
					g2d.drawString("Clk ",  4 , 280 );
*/
					g2d.setColor(Color.red);
					for( i = 0 ; i < no_values - 1 ; i++ )
					{
					   g2d.drawLine(40+2*i , 420-(int)Math.round(V_out[i]*70) , 40 + 2*(i+1) , 420-(int)Math.round(V_out[i+1]*70) );
					}
				//	g2d.drawLine( 6 , 385-40 , 20 , 385-40);
					g2d.drawString("Q ",  8 , 400 -40);

					g2d.setColor(Color.black);
					g2d.setStroke(new BasicStroke(1));
					g2d.drawLine(40 , 0 , 40  , 500 );
					g2d.drawLine( 0  , 460 , 380 , 460 );
					
					g2d.drawString("Time --> ",  160 , 480 );
				//	g2d.drawString("Volt",  10 , 100 );
				//	g2d.drawString("Volt",  10 , 260 );
				//	g2d.drawString("Volt",  10 , 380 );
					
				//	g2d.drawString("WAVEFORM OUTPUT SIMULATION  ",  80 , 20 );
				//	g2d.drawString("OF THE DRAWN CIRCUIT - ",  100 , 40 );

				//	g2d.drawLine(20 , 260 , 20  , 420 );
				//	g2d.drawLine( 20  , 420 , 400 , 420 );
				//	g2d.drawLine(95 , 290 , 1000  , 290 );

				}

			}
/**==================================================================================================================
// All Panel Declarations ===========================================================================================
//==================================================================================================================**/
		JPanel topPanel = new JPanel () ;
			JButton simulate_button ;
			JButton graph_button ;
			JComboBox exp_list ;
			JButton layout_button ;

		JSplitPane splitPane ; // devides center pane into left and right panel 
		JPanel rightPanel = new JPanel();// = new exp1_graph();
	//	graph waveRightPanel = new graph() ;// = new exp1_graph();
		graph waveRightPanel ;//= new graph() ;// = new exp1_graph();

		JPanel leftPanel = new JPanel() ;
			JSplitPane leftSplitPane ;  // divides left Panel into ( tool Panel ) and (work panel )...
			JPanel toolPanel = new JPanel ();
				JPanel toolPanelUp ;
					JButton selected ;
				JPanel toolPanelDown ;
					JToolBar leftTool1 = new JToolBar(1);
						JButton img_button1[] = new JButton[10] ;
					JToolBar leftTool2 = new JToolBar(1);
						JButton img_button2[] = new JButton[10] ;
			WorkPanel workPanel = new WorkPanel(); // above defines new class WorkPanel
//==================================================================================================================
//==================================================================================================================

		public  MyPanel()
		{	
			super(new BorderLayout());
			int i ;
//--------------------------------------------------------------------------------
//CREATIE AND SET UP THE CONTENT PAGE .===========================================
//--------------------------------------------------------------------------------

			try // geting base URL address of this applet 
			{
				base = getDocumentBase();
			}
			catch( Exception e) {}

//------------------------------------------------------------------------------------
// Setting Left Pannel Of (Main Center Panel)---------------------------------------------- 
			leftPanel.setLayout(new BorderLayout());
			leftPanel.setMinimumSize(new Dimension(900 , 1000)); // for fixing size

			leftSplitPane = new JSplitPane( JSplitPane.HORIZONTAL_SPLIT , toolPanel , workPanel); // spliting left in tool & work
			leftSplitPane.setOneTouchExpandable(true); // this for one touch option 
			leftSplitPane.setDividerLocation(0.2);  
			leftPanel.add(leftSplitPane, BorderLayout.CENTER);

// setting work panel -----------------------------------
			//	System.out.println( leftSplitPane.getRightComponent().getSize());

			// setting tool panel --------------------------------------

			for ( i = 1 ; i <= 6 ; i ++ )
			{
				java.net.URL imgURL = getClass().getResource("images1/comp" + i + ".gif");
				if (imgURL != null) 
				{
					icon[i] =  new ImageIcon(imgURL);
					img[i] =  getImage(imgURL);
				}
				else 
				{
					System.err.println("Couldn't find file: " );
					icon[i] =  null;
				}


				img_button1[i] = new JButton ( icon[i] );
				img_button1[i].setOpaque(true);
				img_button1[i].setMargin(new Insets (0,0,0,0));
				img_button1[i].addActionListener(this);
				img_button1[i].setBackground(Color.white);
				img_button1[i].setToolTipText(comp_str[i]);// setting name for hovering of mouse

				leftTool1.add(img_button1[i]);
			}
			int j = 0 ;
			for ( i = 1 ; i <= 6 ; i ++ )
			{
				j = 6 + i ; // for index setting 
				java.net.URL imgURL = getClass().getResource("images1/comp" + j + ".gif");
				if (imgURL != null) 
				{
					icon[j] =  new ImageIcon(imgURL);
					img[j] =  getImage(imgURL);
				}
				else 
				{
					System.err.println("Couldn't find file: " );
					icon[j] =  null;
				}



				img_button2[i] = new JButton ( icon[j] );
				img_button2[i].setOpaque(true);
				img_button2[i].setMargin(new Insets (0,0,0,0));
				img_button2[i].addActionListener(this);
				img_button2[i].setBackground(Color.white);
				img_button2[i].setToolTipText(comp_str[j]); // setting name at hovering of mouse 

				leftTool2.add(img_button2[i]);
			}


			toolPanel.setLayout(new BorderLayout());


			//			MySelected toolPanelUp = new MySelected();
			toolPanelUp = new JPanel();
			toolPanelDown = new JPanel();

			URL selected_URL = getClass().getResource("images1/comp" + 0 + ".gif");
			if (selected_URL != null) 
			{
				icon[0] =  new ImageIcon(selected_URL);
			}
			else 
			{
				System.err.println("Couldn't find file: " );
				icon[0] =  null;
			}
			selected = new JButton(icon[0]);

			selected.setBackground(Color.orange);
			selected.setToolTipText(comp_str[0]); // setting name at hovering of mouse 

			toolPanel.add(toolPanelUp , BorderLayout.CENTER);


			JPanel temp_p = new JPanel();
			temp_p.setLayout(new BorderLayout());

			JPanel temp_pp = new JPanel();
			JLabel temp = new JLabel("<html> <FONT color=white size=6 ><b>TOOL BAR<b/><font/><html/>");
			temp_pp.add(temp);
			temp_pp.setBackground(Color.gray);
			temp_pp.setBorder(BorderFactory.createRaisedBevelBorder( ));

			temp_p.add(temp_pp , BorderLayout.NORTH);
			temp_p.add(new JLabel("<html> <br/><br/><html/>") , BorderLayout.CENTER);


			toolPanel.add(temp_p , BorderLayout.NORTH);
			toolPanel.add(toolPanelDown , BorderLayout.SOUTH);
			selected.setBorder(BorderFactory.createTitledBorder(" SELECTED ICON "));
			toolPanelDown.setBorder(BorderFactory.createTitledBorder(" AVALIABLE ICONS "));


			toolPanelUp.setLayout(new BorderLayout());
			toolPanelUp.add(selected, BorderLayout.NORTH);
			toolPanelUp.add(new JLabel("<html> <br/><html/>"), BorderLayout.SOUTH);

			toolPanelDown.add(leftTool1);
			toolPanelDown.add(leftTool2);

			leftTool1.setFloatable(false);
			leftTool2.setFloatable(false);

			//leftPanel.setMaximumSize(new Dimension( 100, 1000)); // for fixing size 

//------------------------------------------------------------------------------------
// Setting (((Right Panel))) in center Panel ------------------------------------------------


/*			String fileToRead ="outfile";
			URL url2 = null;
			try{
				url2 = new URL(getCodeBase(), fileToRead);
			}
			catch(MalformedURLException e){
				System.out.println("I did't got the outfile to read :( :( So I am very said ");
			}
			graph rightPanel  = new graph(url2);

 */			
			rightPanel.setLayout( new BorderLayout() );
			
//			JLabel wave_head = new JLabel("This is the wave simulation output");
			JLabel wave_head = new JLabel ( "<html><FONT COLOR=white SIZE=6 ><B>SIMULATION OF CIRCUIT</B></FONT></html>", JLabel.CENTER);
			wave_head.setBorder(BorderFactory.createRaisedBevelBorder( ));

			rightPanel.setBackground(Color.gray);

			waveRightPanel = new graph() ;// = new exp1_graph();
			rightPanel.add(wave_head, BorderLayout.NORTH);
			rightPanel.add(waveRightPanel, BorderLayout.CENTER);
			

// 			waveRightPanel.setVisible(false);



			//rightPanel.addMouseMotionListener(); // whole panel is made to detect 

//---------------------------------------------------------------------------------
// Setting Center  Split ============================================================
		//	splitPane = new JSplitPane( JSplitPane.HORIZONTAL_SPLIT , leftPanel , rightPanel);
		//	splitPane.setOneTouchExpandable(true); // this for one touch option 
		//	splitPane.setDividerLocation(0.2);  
		//	add(splitPane, BorderLayout.CENTER);
			add(leftPanel, BorderLayout.CENTER);
//-------------------------------------------------------------------------------------------
//Setting Top Panel ========================================================================== 

			add(topPanel , BorderLayout.NORTH);
			topPanel.setBackground(Color.gray);
			JPanel headButton = new JPanel (new FlowLayout(FlowLayout.CENTER , 100 , 10 )) ;
			JLabel heading = new JLabel (  "<html><FONT COLOR=WHITE SIZE=18 ><B> D-Flip Flop : Positive Edge Trigger </B></FONT></html>", JLabel.CENTER);
			heading.setBorder(BorderFactory.createEtchedBorder( Color.black , Color.white));
			//			headButton.setBorder(BorderFactory.createLineBorder( Color.black));
			//			heading.setBorder(BorderFactory.createTitledBorder("."));

			topPanel.setLayout(new BorderLayout());

			topPanel.add(heading , BorderLayout.CENTER);
			topPanel.add(headButton , BorderLayout.SOUTH);
			java.net.URL imgURL = getClass().getResource("images1/simulate1.png");
			java.net.URL imgURL2 = getClass().getResource("images1/graph.gif");
			if (imgURL != null && imgURL2 != null) 
			{
				icon_simulate =  new ImageIcon(imgURL);
				icon_graph =  new ImageIcon(imgURL2);
			}
			else 
			{
				System.err.println("Couldn't find file: " );
				icon_simulate =  null;
				icon_graph =  null;
			}
			simulate_button = new JButton(" SIMULATE " , icon_simulate );
			icon_simulate.setImageObserver(simulate_button);

			graph_button = new JButton (" FULL GRAPH " , icon_graph);
			icon_graph.setImageObserver(graph_button);
			simulate_button.setToolTipText("For Simulation");
			
			String[] my_list = {"Input Wave 1" , "Input Wave 2" ,"Input Wave 3" , "Input Wave 4" };
			exp_list = new JComboBox (my_list);
			exp_list.setSelectedIndex(0);
			
			layout_button = new JButton (" LAYOUT DESIGN ");
			layout_button.setToolTipText("For Layout");


			headButton.add(simulate_button );
		//	headButton.add(graph_button );
			headButton.add(exp_list );
		//	headButton.add(layout_button );


			simulate_button.addActionListener(this);
		//	graph_button.addActionListener(this);
			exp_list.addActionListener(this);
		//	layout_button.addActionListener(this);
			//-------------------------------------------------------------------------------------------
			//Setting Bottom Panel ========================================================================== 
			JPanel bottom = new JPanel(new FlowLayout());
			add(bottom , BorderLayout.SOUTH);
			JLabel h = new JLabel (  "<html><FONT COLOR=WHITE SIZE=12 ><B>THIS IS VLSI EXPERIMENT</B></FONT></html>", JLabel.CENTER);
//			bottom.add(h );

			//================================================================================================
			setBorder(BorderFactory.createLineBorder( Color.black));
			//	setBorder(BorderFactory.createTitledBorder("HI"));

		}
		// To change the icon at the selected part ..................
		public boolean circuit_check()
		{
			int check_points_value[][] = new int[13][13] ; // each index will store corresponding  component for points of (comp point no -> index )
			int i = 0 , j , j1 = 0, k1 = 0 , j2 = 0 , k2 = 0 , l = 0 ;
			for (  i = 0 ; i < 10 ; i ++ )
			{
				for (  j = 0 ; j < 10 ; j ++ )
				{
					check_points_value[i][j] = -1 ;
				}
			}
			System.out.println("total_wire");
			System.out.println(total_wire);
			for (  i = 0 ; i < total_wire ; i ++ )
			{
				j1 = wire[i].x1;
				k1 = wire[i].y1;
				j2 = wire[i].x2;
				k2 = wire[i].y2;

				if (wire[i].del == false &&  end_points_mat[j1][k1] != -1 && end_points_mat[j2][k2] != -1 )
				{
					
					l = 0 ;
					while ( check_points_value[ end_points_mat[j1][k1] ][l] != -1 )
					{
						l++;
					}
					check_points_value[end_points_mat[j1][k1]][l] =  end_points_mat[j2][k2];

					l = 0 ;
					while ( check_points_value[ end_points_mat[j2][k2] ][l] != -1 )
					{
						l++;
					}
					check_points_value[end_points_mat[j2][k2]][l] =  end_points_mat[j1][k1];
				}

				
			}
						
			int temp ;
			for (  i = 0 ; i < 10 ; i ++ ) // for making aal connected point for each end_point in its array ..
			{	
				
				l = 0 ;
				while ( check_points_value[i][l] != -1 )
				{
					l++;
				}

				int r = 0 ;
				temp = check_points_value[i][r++];
				while ( temp != - 1 )
				{
					int k = 0 ;
					while ( check_points_value[temp][k] != - 1)
					{
						int flag = 0 ;
						for ( int m = 0 ; m < l ; m ++ )
						{
							if ( check_points_value[temp][k] == check_points_value[i][m] )
							{
								flag = 1 ;
								break ;
							}
						}
						if ( flag == 0 )
						{
							check_points_value[i][l++] = check_points_value[temp][k];
						}
						k++;
					}
					temp = check_points_value[i][r++]; // for each (element) value of i(th) element of array
				}
				
			}
			// checking 
			System.out.println("check_points_value[i]");
			for (  i = 0 ; i < 10 ; i ++ )
			{
				System.out.println(check_points_value[i][0]);
				l = 1 ;
				while ( check_points_value[i][l] != -1 )
				{
					System.out.println(check_points_value[i][l++]);
				}
			}

			
			for (  i = 0 ; i < 10 ; i ++ )
			{
				if ( check_points_value[i][0] == -1 )  
				{
					System.out.println("free wire");
					return false ; // if any end point of component is free then wrong circiut ...
				}
			}

//========================================================================================================================================================
// ================================== exp6  ( Flip Flop )  circuit check ===========================================================
//========================================================================================================================================================
/*
// FOR allowing all permutation of the 4 PMOS and 4 NMOS chips .		
			int N1 = 2, N2 = 5 , N3 = 8 , N4 = 11, P1 = 14, P2  = 17, P3 = 20, P4 = 23 ;
			for ( i = 24 ; i <= 27 ; i ++ )   // INPUT COMP END POINTS 
			{
					l = 0 ;
					// Here assumming each input is connected to only "ONE" PMPS and "ONE" NMOS only .
					while ( check_points_value[24][l] != -1 )
					{
						if ( check_points_value[24][l] == 2 ||  check_points_value[24][l] == 5 ||  check_points_value[24][l] == 8 ||  check_points_value[24][l] == 11 )   // if A is connected to NMOS chips 
						{
							if ( i == 24 ) // Input A 
							{	
								N1 =  check_points_value[24][l] ;
							}
							else if ( i == 25 ) // Input A' 
							{	
								N2 =  check_points_value[24][l] ;
							}
							else if ( i == 26 ) // Input B 
							{	
								N4 =  check_points_value[24][l] ;
							}
							else if ( i == 27 ) // Input B' 
							{	
								N3 =  check_points_value[24][l] ;
							}
						}
						else if ( check_points_value[24][l] == 14 ||  check_points_value[24][l] == 17 ||  check_points_value[24][l] == 20 ||  check_points_value[24][l] == 23 )   // if A is connected to PMOS chips 
						{
							
							if ( i == 24 ) // Input A 
							{	
								P1 =  check_points_value[24][l] ;
							}
							else if ( i == 25 ) // Input A' 
							{	
								P2 =  check_points_value[24][l] ;
							}
							else if ( i == 26 ) // Input B 
							{	
								P4 =  check_points_value[24][l] ;
							}
							else if ( i == 27 ) // Input B' 
							{	
								P3 =  check_points_value[24][l] ;
							}
							
						}
						else 
						{
							return false ; // Circuit is not correct  (If input is not connect to other than  NPOS / NPOS )
						}
					}
			}
			// Changing the PNOS length and width etc .
//                         -------------------------			need to wrtie this part of code
			String t = null ;
			//For NMOS 
			if ( N1 != 2 )
			{
				if ( N1 == 5 ) // 2nd NMOS 
				{
					t = Nmos1_l ;
					Nmos1_l = Nmos2_l;
					Nmos2_l = t ;
					
					t  = Nmos1_w;
					Nmos1_w = Nmos2_w;
					Nmos2_w = t ;
				
				}
				else if ( N1 == 8 ) // 3rd NMOS 
				{
					t = Nmos1_l ;
					Nmos1_l = Nmos3_l;
					Nmos3_l = t ;
					
					t  = Nmos1_w;
					Nmos1_w = Nmos3_w;
					Nmos3_w = t ;
				}
				else if ( N1 == 11 ) // 4th NMOS 
				{
					t = Nmos1_l ;
					Nmos1_l = Nmos4_l;
					Nmos4_l = t ;
					
					t  = Nmos1_w;
					Nmos1_w = Nmos4_w;
					Nmos4_w = t ;
				}
			}
			if ( N2 != 5 )
			{
				if ( N2 == 8 ) // 3rd NMOS 
				{
					t = Nmos1_l ;
					Nmos2_l = Nmos3_l;
					Nmos3_l = t ;
					
					t  = Nmos1_w;
					Nmos2_w = Nmos3_w;
					Nmos3_w = t ;
				}
				else if ( N2 == 11 ) // 4th NMOS 
				{
					t = Nmos2_l ;
					Nmos2_l = Nmos4_l;
					Nmos4_l = t ;
					
					t  = Nmos2_w;
					Nmos2_w = Nmos4_w;
					Nmos4_w = t ;
				}
			}
			if ( N3 != 8 )
			{
				if ( N3 == 11 ) // 4th NMOS 
				{
					t = Nmos3_l ;
					Nmos3_l = Nmos4_l;
					Nmos4_l = t ;
					
					t  = Nmos3_w;
					Nmos3_w = Nmos4_w;
					Nmos4_w = t ;
				}
			}
			// for PMOS
			if ( P1 != 14 )
			{
				if ( P1 == 17 ) // 2nd PMOS 
				{
					t = Pmos1_l ;
					Pmos1_l = Pmos2_l;
					Pmos2_l = t ;
					
					t  = Pmos1_w;
					Nmos1_w = Pmos2_w;
					Pmos2_w = t ;
				
				}
				else if ( P1 == 20 ) // 3rd PMOS 
				{
					t = Pmos1_l ;
					Pmos1_l = Pmos3_l;
					Pmos3_l = t ;
					
					t  = Pmos1_w;
					Pmos1_w = Pmos3_w;
					Pmos3_w = t ;
				}
				else if ( P1 == 23 ) // 4th PMOS 
				{
					t = Pmos1_l ;
					Pmos1_l = Pmos4_l;
					Pmos4_l = t ;
					
					t  = Pmos1_w;
					Pmos1_w = Pmos4_w;
					Pmos4_w = t ;
				}
			}
			if ( P2 != 17 )
			{
				if ( P2 == 20 ) // 3rd PMOS 
				{
					t = Pmos1_l ;
					Pmos2_l = Pmos3_l;
					Pmos3_l = t ;
					
					t  = Pmos1_w;
					Pmos2_w = Pmos3_w;
					Pmos3_w = t ;
				}
				else if ( P2 == 23 ) // 4th PMOS 
				{
					t = Pmos2_l ;
					Pmos2_l = Pmos4_l;
					Pmos4_l = t ;
					
					t  = Pmos2_w;
					Pmos2_w = Pmos4_w;
					Pmos4_w = t ;
				}
			}
			if ( P3 != 20 )
			{
				if ( P3 == 23 ) // 4th PMOS 
				{
					t = Pmos3_l ;
					Pmos3_l = Pmos4_l;
					Pmos4_l = t ;
					
					t  = Pmos3_w;
					Pmos3_w = Pmos4_w;
					Pmos4_w = t ;
				}
			}	
				
			
			// Now we know which is NMOS 1-4 or PMOS1-4
			// Replacement array ;
			
			int[] replace = new int[40];
			for( i = 0 ; i < 40 ; i ++ )
			{
				replace[i] = i ;
				if ( i >= 0 && i <=  2)  
				{
					replace[i] = N1 + i ;
				}
				else if ( i >= 3 && i <=  5)
				{
					replace[i] = N2 + i - 3;
				}
				
				else if ( i >= 3 && i <=  5)
				{
					replace[i] = N2 + i - 3;
				}
				else if ( i >= 6 && i <=  8)
				{
					replace[i] = N3 + i - 6;
				}
				else if ( i >= 9 && i <=  11)
				{
					replace[i] = N4 + i - 9;
				}
				else if ( i >= 12 && i <=  14)
				{
					replace[i] = P1 + i - 12;
				}
				else if ( i >= 15 && i <=  17)
				{
					replace[i] = P2 + i - 15;
				}
				else if ( i >= 18 && i <=  20)
				{
					replace[i] = P3 + i - 18;
				}
				else if ( i >= 21 && i <=  23)
				{
					replace[i] = P4 + i - 21;
				}
			}
	//--------------------------------------------------------------------------------
*/			// Used Replaced array only for indexies ( 0-23 ) i.e NPOS and PMOS
			
			// Latch1 = 0-2 ;; Latch2 = 3-5 ;; OUTPUT = 6 ; INPUT = D:7 , clk: 8 , clk': 9;
			
			if ( exp_type == 1 ) // Flip Flop
			{
				l = 0 ;
				while (  check_points_value[6][l] != -1 )  // OUT 
				{
					if ( check_points_value[6][l] != 6 && check_points_value[6][l] != 4 )
					{
						System.out.println("out");			
						return false ;
					}
					l++;
				}
				l = 0 ;
				while (  check_points_value[7][l] != -1 )  // IN(D)
				{
					if ( check_points_value[7][l] != 7 &&  check_points_value[7][l] != 2 )
					{
						System.out.println("IN(D)");			
						return false ;
					}
					l++;
				}
				l = 0 ;
				while (  check_points_value[1][l] != -1 )  // Output of Latch1 and Input of Latch2
				{
					if ( check_points_value[1][l] != 1 && check_points_value[1][l] != 5 )
					{
						System.out.println("Output of Latch1 and Input of Latch2");			
						return false ;
					}
					l++;
				}
				l = 0 ;
				while (  check_points_value[8][l] != -1 )  // CLK
				{
					if ( check_points_value[8][l] != 8 &&    check_points_value[8][l] != 0 )
					{
							System.out.println("CLK");			
						return false ;
					}
					l++;
				}
  				l = 0 ;
				while (  check_points_value[9][l] != -1 )  // CLK'
				{
					if ( check_points_value[9][l] != 9 &&  check_points_value[9][l] != 3 )
					{
							System.out.println("clk'");			
						return false ;
					}
					l++;
				}
				
				return true ;
			}
			System.out.println("end");			
		return false ;
		}

		public void change_selected (int no)
		{

			selected.setIcon(icon[no]);
		}
		public void actionPerformed(ActionEvent e )
		{

			if ( e.getSource() == exp_list )
			{
				JComboBox cb = (JComboBox)e.getSource();
				if ( cb.getSelectedIndex() == 0 )
				{
					input_type = 1 ;
				}
				else if ( cb.getSelectedIndex() == 1 )
				{
					input_type = 2 ;	
				}
				else if ( cb.getSelectedIndex() == 2 )
				{
					input_type = 3 ;	
				}
				else 
				{
					input_type = 4 ;
					
/*					// Move to the Pass Transistor exp
					URL base = null ;
					try // geting base URL address of this applet 
					{
							base = getDocumentBase();
					}
					catch( Exception e1) {}
					try
					{
						//URL url = new URL("http://localhost/VirtualLab/VLSI_VLab/exp1_out.php?name=Shahsank");
						URL url = new URL(base ,"exp6_latch_positive.html");
						getAppletContext().showDocument(url ,"_self");
					}
					catch(Exception e2 )
					{}*/
				}
			}
			else if(e.getSource() == simulate_button )
			{
				System.out.println("simulate_button");
				if ( circuit_check() )
				{
					System.out.println("Circuit Correct :)");
				}
			
				if (circuit_check())
				{
					//		callJS();
					URL php_file =null ;

					URLConnection c =null;
					String      encoded = "inputCode=" + URLEncoder.encode(Integer.toString(input_type));
					URL CGIurl = null;
					try
					{
				/*		if ( exp_type == 1 )
						{
							php_file = new URL(getDocumentBase(),"exp9_flipflop_positive_verilog_simulate.php");
						
							System.out.println( php_file.toString());
						}
						else if ( exp_type == 0 )
						{
							php_file = new URL(getDocumentBase(),"exp9_flipflop_positive_verilog_simulate.php");
							System.out.println( php_file.toString());
						}
				*/		// Showing output file 
						URL url = new URL(base ,"./codes/dffp/dffp"+Integer.toString(input_type)+".vcd");
						getAppletContext().showDocument(url , "Output");
					}
					catch(Exception mye )
					{
						System.out.println("Can't open file ");
					}
					//				String theCGI = "http://localhost/VirtualLab/VLSI_VLab/exp1_out.php";

/*					try
					{
						
						c = php_file.openConnection();
						c.setDoOutput(true);
						c.setUseCaches(false);
						c.setRequestProperty("content-type","application/x-www-form-urlencoded");
						
						DataOutputStream out = new DataOutputStream(c.getOutputStream());
						out.writeBytes(encoded);
						out.flush(); out.close();
	
						BufferedReader in =
							new BufferedReader(new InputStreamReader(c.getInputStream()));
	
						String aLine;
						while ((aLine = in.readLine()) != null) 
						{
							// data from the CGI
							System.out.println(aLine);
						}

					}	
					catch(Exception php_e )
					{
						System.out.println("Can't make connection");
					}
*/				//waveRightPanel.make_graph() ;// Read file OUTFILE and draw the 
				//waveRightPanel.repaint();
				//waveRightPanel.setVisible(true);
				simulate_flag = true ;
				}
				else
				{
					JOptionPane.showMessageDialog(null, "Circuit is not Complete , Please Complete it and press simulate again :)");
				}
			}
		
			else if ( e.getSource() == layout_button )
			{
				System.out.println("layout_button");
//				if ( simulate_flag == true )
		//		{
					try
					{
						//URL url = new URL("http://localhost/VirtualLab/VLSI_VLab/exp1_out.php?name=Shahsank");
						URL url = new URL(base ,"exp5_fullgraph.php?name=Shahsank");
						getAppletContext().showDocument(url , "Layout Design ");
					}
					catch(Exception ee )
					{}
		//		}
			//	else
			//	{
			//		JOptionPane.showMessageDialog(null, "Circuit is not simulated , Please Simulate it and press Full Graph Button again");
			//	}
		
			}
			else if(e.getSource() == graph_button )
			{
				System.out.println("graph_button");
				if ( simulate_flag == true )
				{
					try
					{
						//URL url = new URL("http://localhost/VirtualLab/VLSI_VLab/exp1_out.php?name=Shahsank");
						
						URL url = null ;
						if ( exp_type == 0 )
						{
							url = new URL(base ,"exp5_Pass_fullgraph.php");
						}
						else if ( exp_type == 1 )
						{
							url = new URL(base ,"exp3_Multiplexer_fullgraph.php");
						}
						getAppletContext().showDocument(url , "Output Exp 5 ");
					}
					catch(Exception ee )
					{}
				}
				else
				{
					JOptionPane.showMessageDialog(null, "Circuit is not simulated , Please Simulate it and press Full Graph Button again");
				}
		
			}
			else if (e.getSource() == img_button1[1] )
			{
				JOptionPane.showMessageDialog(null, "For this Exp your don't need this component !! :)");
				
			}
			else if (e.getSource() == img_button1[2] )
			{
					JOptionPane.showMessageDialog(null, "For this Exp your don't need this component !! :)");
			
			}
			else if (e.getSource() == img_button1[3] ) // Wire :)
			{
				img_button_pressed = 3 ;	
				change_selected(3);
			}
			else if (e.getSource() == img_button1[4] ) // Input 
			{
				if ( comp_count[4] < 3 ) // 3 inputs are allowed 
				{
					img_button_pressed = 4 ;	
					change_selected(4);
				}
				else
				{
 					JOptionPane.showMessageDialog(null, "You already have THREE of these component !! :)");
				}
			//	JOptionPane.showMessageDialog(null, "For this Exp your don't need this component !! :)");
			//	img_button_pressed = 4 ;	
			//	change_selected(4);
			}
			else if (e.getSource() == img_button1[5] )  // 2Input Mux 
			{
				JOptionPane.showMessageDialog(null, "For this Exp your don't need this component !! :)");
		
			}
			else if (e.getSource() == img_button1[6] )
			{
				JOptionPane.showMessageDialog(null, "For this Exp your don't need this component !! :)");
			//	img_button_pressed = 6 ;	
			//	change_selected(6);
			}
			else if (e.getSource() == img_button2[1] ) // NMOS
			{
				JOptionPane.showMessageDialog(null, "For this Exp your don't need this component !! :)");
			}
			else if (e.getSource() == img_button2[2] ) // Capacitor 
			{
				JOptionPane.showMessageDialog(null, "For this Exp your don't need this component !! :)");
			}
			else if (e.getSource() == img_button2[3] ) // VDD
			{
					JOptionPane.showMessageDialog(null, "For this Exp your don't need this component !! :)");
			
			}
			else if (e.getSource() == img_button2[4] ) // OUTPUT 
			{
				if ( comp_count[10] == 0 )
				{
					img_button_pressed = 10 ;	
					change_selected(10);
				}
				else
				{
					JOptionPane.showMessageDialog(null, "You already have this component !! :)");
				}
			//	JOptionPane.showMessageDialog(null, "For this Exp your don't need this component !! :)");
			//	img_button_pressed = 10 ;	
			//	change_selected(10);
			}
			else if (e.getSource() == img_button2[5] ) // Latch
			{
				if ( comp_count[11] < 2 ) // Only 2 components are allowed 
				{
					img_button_pressed = 11 ;	
					change_selected(11);
				}
				else
				{
					JOptionPane.showMessageDialog(null, "You already have TWO of these component !! :)");
				}
			}
			else if (e.getSource() == img_button2[6] )
			{
				JOptionPane.showMessageDialog(null, "For this Exp your don't need this component !! :)");
			//	img_button_pressed = 12 ;	
			//	change_selected(12);
			}

		}
		public void mouseMoved(MouseEvent me) 
		{ 
			System.out.println("In Right Panel ");

		} 
		public void mouseDragged(MouseEvent e) {}

	}// MyPanel class extends JPanel Class Ends here
}

