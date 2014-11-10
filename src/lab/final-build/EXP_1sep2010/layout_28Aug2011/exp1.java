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
import java.awt.Graphics2D;
import javax.swing.*;
import javax.swing.Popup;
import javax.swing.PopupFactory;
import javax.swing.text.*;
import javax.swing.tree.*;
import javax.swing.table.*;
import javax.swing.ImageIcon.*;
import java.awt.geom.*;

public class exp1 extends JApplet 
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
		/** New Variables ************************/
		int[][][] work_mat_array ;
		node[][]  each_comp_node_array = new node[10][20];
		int work_x ;
		int work_y ;
		int X;
		int Y;
		


		int mat_count = 12;
		int work_panel_width = 1800 ;
		int work_panel_height = 1600;
		int width = 10 ; // Width of the Work Panel Dots


		int total_comp_type = 10;  // Total Comp present
		int[] comp_count = new int[20] ; //  comp_count[i] represents the count of ( comp"i".jpg ) component ..		
		int total_comp = 0 ;
		int img_button_pressed = -1 ;	
		int comp_pick_mode = 0 ;
		boolean node_strech = false ;

		int current_comp_width = -1 ;    // Size of component before fixing it 
		int current_comp_height = -1 ;

		int selected_mat = 0 ;  //No matrix is selected
		int selected_index = -1 ;  //No index is selected
		
		/** Work Panel Variables ************************************************************************************************/
		double scale_x = 1 ;  // scaling of work pannel 
		double scale_y = 1 ;

		
		String content = new String("Selected ");
		

		int work_img_width = 50;
		int work_img_height = 50;

		//*************************************************************************************************************************************
		
		Image img[] = new Image[20] ;
		ImageIcon icon[] = new ImageIcon[20] ;

		ImageIcon icon_fix_size ;
		ImageIcon icon_check ;

		MediaTracker mt ;
		URL base ;
		String[] comp_str = {		// This will be shown on tool tip
			"This is shows which component is selected ." ,
			"Metal1 ", " Poly Contact ",  "Metal contact ",// 1, 2 , 3
			"Active " , "N Well " ,"N Select ", // 4 , 5 ,6

			 " P Select " ,"via"  // 7 , 8  
			};
		public 	class node 
		{
			int node_x ;
			int node_y ;

			int width ;
			int height ;

			boolean del ;

			int img_no ;
			int matrix_number;
			int node_index ;   // index for of the particular component

			public node (int x , int y ,int matrix_no, int index , int w , int h)
			{
				node_x = x ;
				node_y = y ;
				width = w ;
				height = h ;

				node_index = index ;				
				img_no = matrix_number = matrix_no;
				del = false ;

			}
			public void del ()
			{
				del = true ;
			}
			public void update_mat( ) // update the matrix value to work_mat // index is the index of the node_comp matrix
			{
				int i , j ;
				
				for ( i = node_x ; i < node_x + width ; i++)
				{
					for ( j = node_y ; j < node_y + height  ; j++ )
					{		
						work_mat_array[matrix_number][i][j] =  node_index ;   // update the matrix as the img is selected  	
					}
				}	
				System.out.println("--------------------");
				System.out.println("matrix_number");
				System.out.println(matrix_number);
				System.out.println(node_index);
				System.out.println("node_index");
					int count = 0  , k ;
					for ( i = 0 ;i < 10 ; i ++ )
						for ( j = 0 ; j < 400 ; j ++ )
							for ( k =0 ; k < 400 ; k ++ )
								if ( work_mat_array[i][j][k] != -1 )
									count++;
				System.out.println(count);
				System.out.print("node_index");
				System.out.println(node_index);
				System.out.println("--------------------");
			}
			public void remove_mat() // delete the previous value from work_mat
			{
				int i , j ;
				for ( i = node_x ; i < node_x + width ; i++)
				{
					for ( j = node_y ; j < node_y + height  ; j++ )
					{
						work_mat_array[matrix_number][i][j] =  -1 ;   // update the matrix as the img is selected  	
					}
				}
				
			}
			
		}
		public  class WorkPanel extends JPanel  implements  MouseMotionListener , MouseListener   
		{
			public WorkPanel()
			{
				Arrays.fill(comp_count , 0);

				addMouseMotionListener(this); // whole panel is made to detect 
				addMouseListener(this); // whole panel is made to detect 

				work_mat_array = new int[mat_count][work_panel_width][work_panel_height];

				int i , j , k ;
				for ( i = 0 ; i < work_panel_width ; i++)
				{
					for ( j = 0 ; j < work_panel_height ; j++ )
					{
						for ( k = 0 ; k < mat_count ; k ++ )
						{
							work_mat_array[k][i][j] = -1 ;
						}
					}
				}
				

			}
	
			
			public void mouseMoved(MouseEvent me) 
			{ 
				work_x = me.getX();
				work_y = me.getY();
				X = work_x;
				Y = work_y;
			}
			public void mouseDragged(MouseEvent me)
			{
				int i , j;
				// Mouse co-ord
				work_x = me.getX();
				work_y = me.getY();
	
				
				if ( comp_pick_mode == 2 && img_button_pressed != -1 ) // Streching is allowed 
				{
					
					if ( node_strech == true )
					{

						each_comp_node_array[img_button_pressed][comp_count[img_button_pressed]-1].remove_mat();
						
						each_comp_node_array[img_button_pressed][comp_count[img_button_pressed]-1].width  = java.lang.Math.abs(each_comp_node_array[img_button_pressed][comp_count[img_button_pressed]-1].node_x - (work_x /width )*width );

				  		each_comp_node_array[img_button_pressed][comp_count[img_button_pressed]-1].height  = java.lang.Math.abs(each_comp_node_array[img_button_pressed][comp_count[img_button_pressed]-1].node_y -( work_y /width)*width );

						each_comp_node_array[img_button_pressed][comp_count[img_button_pressed]-1].update_mat();

						repaint();

						current_comp_width = each_comp_node_array[img_button_pressed][comp_count[img_button_pressed]-1].width / width ;
						current_comp_height = each_comp_node_array[img_button_pressed][comp_count[img_button_pressed]-1].height / width ;

					}


				}
				else if (  comp_pick_mode == 0 && img_button_pressed == -1 && selected_mat != 0 && work_x >= 0 && work_y >= 0 ) // Move  is allowed 
				{
					
					System.out.print("selected_mat");
					System.out.println(selected_mat);
					

					each_comp_node_array[selected_mat][selected_index].remove_mat();
						
					each_comp_node_array[selected_mat][selected_index].node_x = (work_x /width )*width ;
					each_comp_node_array[selected_mat][selected_index].node_y = (work_y /width )*width ;
	
					each_comp_node_array[selected_mat][selected_index].update_mat();

					int count = 0 ,  k ;
					for ( i = 0 ;i < 10 ; i ++ )
						for ( j = 0 ; j < 400 ; j ++ )
							for ( k =0 ; k < 400 ; k ++ )
								if ( work_mat_array[i][j][k] != -1 )
									count++;
					System.out.print("count");
					System.out.println(count);
					repaint();
			
				}
	
			}
			public void mouseClicked(MouseEvent me) 
			{
				work_x = me.getX();
				work_y = me.getY();

				if ( comp_pick_mode == 1 ) // Component Button is already pressed ( adding new Comp )
				{	
					each_comp_node_array[img_button_pressed][comp_count[img_button_pressed]] = new node((work_x / width)*width , (work_y / width )*width , img_button_pressed ,comp_count[img_button_pressed] , width, width);
					
					each_comp_node_array[img_button_pressed][comp_count[img_button_pressed]].update_mat();
					
					comp_count[img_button_pressed]++ ;
					total_comp++;

					repaint();
					comp_pick_mode = 2; // Now strechteching of comp is allowed
				
				}
				if ( comp_pick_mode == 2 )
				{
				}
				repaint();
			}
			public void mousePressed(MouseEvent me) 
			{
				int i ;
				work_x = me.getX();
				work_y = me.getY();
				if ( comp_pick_mode == 2 ) 
				{
					if ( work_mat_array[img_button_pressed][work_x][work_y] == comp_count[img_button_pressed] -1 )
					{
						node_strech = true ;
					}
				}
				if ( comp_pick_mode == 0 ) 
				{
					for ( i = 1 ; i <= total_comp_type ; i ++ )
					{
						if ( work_mat_array[i][work_x][work_y] != -1 )
						{
							selected_mat = i ;
							selected_index = work_mat_array[selected_mat][work_x][work_y] ;
							break;
						}	
					}


				}

			}
			public void mouseReleased(MouseEvent me) 
			{
				if ( comp_pick_mode == 0 ) 
				{
					selected_mat = 0 ;
					selected_index = -1 ;
				}
			}
			public void mouseEntered(MouseEvent me) {}
			public void mouseExited(MouseEvent me) 	{}


			public void paint(Graphics g) 
			{
				int i , j ;
				Graphics2D g2d = (Graphics2D)g;
				g2d.scale(scale_x , scale_y);
//=================================================================
// Background =====================================================
//=================================================================
				Stroke drawingStroke = new BasicStroke(6, BasicStroke.CAP_BUTT, BasicStroke.JOIN_BEVEL, 0, new float[]{10,1}, 1);
				g2d.setColor(Color.gray);
				g.fillRect(0,0,work_panel_width+500 , work_panel_height+500);
				g2d.setColor(Color.white);

				g2d.setStroke(drawingStroke);
				g2d.setColor(Color.white);
				g2d.setStroke(new BasicStroke(1));
				for ( i = 0 ; i < work_panel_width +400; i+=width)
				{
					for ( j = 0 ; j < work_panel_height+200 ; j+=width )
					{
						g2d.drawOval(  i -1,j-1 , 0 , 0);
					}
				}

//=================================================================
//For Components ========================================================
//=======================================================================
				for ( i = 1; i <= total_comp_type  ; i++ )
				{
					for ( j = 0 ; j < comp_count[i] ; j ++ )
					{
						if ( each_comp_node_array[i][j].del == false )
						{
							if ( each_comp_node_array[i][j].img_no == 1)
							{
								draw_metal1(g2d , each_comp_node_array[i][j].node_x, each_comp_node_array[i][j].node_y  , 	each_comp_node_array[i][j].width , each_comp_node_array[i][j].height);
							}	
							else if ( each_comp_node_array[i][j].img_no == 2)
							{
								draw_poly(g2d , each_comp_node_array[i][j].node_x, each_comp_node_array[i][j].node_y  , each_comp_node_array[i][j].width , each_comp_node_array[i][j].height);
							}
							else if ( each_comp_node_array[i][j].img_no == 3)
							{
								draw_metalcontact(g2d , each_comp_node_array[i][j].node_x, each_comp_node_array[i][j].node_y  , each_comp_node_array[i][j].width , each_comp_node_array[i][j].height);
							}
							else if ( each_comp_node_array[i][j].img_no == 4 )
							{	
								System.out.print("i");
								System.out.println(i);
								System.out.print("j");
								System.out.println(j);
								draw_active(g2d , each_comp_node_array[i][j].node_x, each_comp_node_array[i][j].node_y  , 	each_comp_node_array[i][j].width , each_comp_node_array[i][j].height);
							}							
							else if ( each_comp_node_array[i][j].img_no == 5)
							{
								draw_nwell(g2d , each_comp_node_array[i][j].node_x, each_comp_node_array[i][j].node_y  , each_comp_node_array[i][j].width , each_comp_node_array[i][j].height);	
							}
							else if ( each_comp_node_array[i][j].img_no == 6 )
							{
								draw_nselect(g2d , each_comp_node_array[i][j].node_x, each_comp_node_array[i][j].node_y  , each_comp_node_array[i][j].width , each_comp_node_array[i][j].height);
							}
							else if ( each_comp_node_array[i][j].img_no == 7 )
							{
								draw_pselect(g2d , each_comp_node_array[i][j].node_x, each_comp_node_array[i][j].node_y  , each_comp_node_array[i][j].width , each_comp_node_array[i][j].height);
							}
				
							else if ( each_comp_node_array[i][j].img_no == 8)
							{
								draw_via(g2d , each_comp_node_array[i][j].node_x, each_comp_node_array[i][j].node_y  , each_comp_node_array[i][j].width , each_comp_node_array[i][j].height);
						
							}/*
							else if ( each_comp_node_array[i][j].img_no == 9)
							{
								draw_metalcontact(g2d , each_comp_node_array[i][j].node_x, each_comp_node_array[i][j].node_y  , each_comp_node_array[i][j].width , each_comp_node_array[i][j].height);
							}
							else if (each_comp_node_array[i][j].img_no == 10 )
							{
								draw_via(g2d , each_comp_node_array[i][j].node_x, each_comp_node_array[i][j].node_y  , each_comp_node_array[i][j].width , each_comp_node_array[i][j].height);
							}*/
						}
					}
				}
			}
			
			void draw_nselect(Graphics2D g , int x , int y , int width1 , int width2 )
			{
				Stroke drawingStroke = new BasicStroke(3, BasicStroke.CAP_BUTT, BasicStroke.JOIN_BEVEL, 0, new float[]{9}, 0);
				Line2D line = new Line2D.Double(20, 40, 100, 40);		
				
				g.setColor(new Color(0,0,200,60));
				g.drawRect( x , y , width1 , width2);
				g.fillRect( x, y ,width1 ,width2 );
				
			}
			void draw_active(Graphics2D g , int x , int y , int width1 ,int width2 )
			{
				Stroke drawingStroke = new BasicStroke(3, BasicStroke.CAP_BUTT, BasicStroke.JOIN_BEVEL, 0, new float[]{9}, 0);
				Line2D line = new Line2D.Double(20, 40, 100, 40);		
			
				g.setColor(new Color(0,255,0,128));
				g.drawRect( x , y , width1 , width2);
				g.fillRect( x, y ,width1 ,width2 );
			
			//	setVisible(false);
			}
			void draw_contact(Graphics2D g , int x , int y , int width1 ,int width2)
			{
				g.setColor(new Color(0,0,0,128));
				g.drawRect( x , y , width1 , width2);
				g.fillRect( x, y ,width1 ,width2 );
				
			}
			void draw_metal2(Graphics2D g , int x , int y , int width1,int width2  )
			{
				g.setColor(Color.gray);
				g.drawRect( x , y , width1 , width2);
				g.fillRect( x, y ,width1 ,width2 );
			}
			void draw_pselect(Graphics2D g , int x , int y , int width1,int width2 )
			{
				g.setColor(new Color(255,105,180,110));
				g.drawRect( x , y ,width1 , width2);
				g.fillRect( x, y ,width1 ,width2 );
				g.setColor(Color.red);
			}
			void draw_nwell(Graphics2D g , int x , int y , int width1,int width2  )
			{
				g.setColor(new Color(245,245,0,150));
				g.drawRect( x , y ,width1 ,width2);
				g.fillRect( x, y ,width1 ,width2 );
				g.setColor(Color.black);
			}
			void draw_via(Graphics2D g , int x , int y , int width1 ,int width2 )
			{
				g.setColor(new Color(255,255,255,128));
				g.drawRect( x , y , width1, width2);
				g.fillRect( x, y ,width1 ,width2 );
			}
			void draw_metalcontact(Graphics2D g , int x , int y , int width1,int width2  )
			{
				g.setColor(new Color(0,0,0,128));
				g.drawRect( x , y , width1 , width2);
				g.fillRect( x, y ,width1 ,width2 );
			}
			void draw_poly(Graphics2D g , int x , int y , int width1 ,int width2)
			{
				g.setColor(new Color(255,0,0,108));
				g.drawRect( x , y , width1 , width2);
				g.fillRect( x, y ,width1 ,width2);
			}
			void draw_metal1(Graphics2D g , int x , int y , int width1 ,int width2)
			{
				g.setColor(new Color(0,0,255,128));
				g.drawRect( x , y , width1 , width2);
				g.fillRect( x, y ,width1 ,width2 );
			}
		}
/**==================================================================================================================
// All Panel Declarations ===========================================================================================
//==================================================================================================================**/
//		JPanel contentPane = new JPanel(new BorderLayout());
		JPanel topPanel = new JPanel () ;
			
			JButton fix_size_button ;
			JButton check_button ;

			JButton mag_button ;

		JSplitPane splitPane ; // devides center pane into left and right panel 


		JPanel toolPanel = new JPanel ();
			JPanel toolPanelUp ;
				JButton selected ;
			JPanel toolPanelDown ;
				JToolBar leftTool1 = new JToolBar(1);
				JToolBar rightTool1 = new JToolBar(1);
				//Array to store buttons
					JButton img_button1[] = new JButton[10] ;
					JButton option_button[] = new JButton[10] ;
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


//====================================================================================
// Setting Tool panel --------------------------------------
//=====================================================================================

			//for ( i = 1 ; i <= 5 ; i ++ )
			for ( i = 1 ; i < 5 ; i ++ )
			{
				java.net.URL imgURL = getClass().getResource("images/comp" + i + ".gif");
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
			//for ( i = 0 ; i <= 4 ; i ++ )
			for ( i = 0 ; i < 4 ; i ++ )
			{
				//j = 6 + i ; // for index setting
				j = 5 + i ; // for index setting  
				java.net.URL imgURL = getClass().getResource("images/comp" + j + ".gif");
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


			
			toolPanelUp = new JPanel();
			toolPanelDown = new JPanel();

			URL selected_URL = getClass().getResource("images/comp" + 0 + ".gif");
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

			


//=============================================================================================
// Setting Main  Panel---------------------------------------------- 
//=============================================================================================
			splitPane = new JSplitPane( JSplitPane.HORIZONTAL_SPLIT , toolPanel , workPanel);
			splitPane.setOneTouchExpandable(true); // this for one touch option 
			splitPane.setDividerLocation(0.1);  
			add(splitPane, BorderLayout.CENTER);

//=============================================================================================
//Setting TOP Panel ========================================================================== 
//=============================================================================================
			add(topPanel , BorderLayout.NORTH);
			topPanel.setBackground(Color.gray);

			JPanel headButton = new JPanel (new FlowLayout(FlowLayout.CENTER , 100 , 10 )) ;
			JLabel heading = new JLabel (  "<html><FONT COLOR=WHITE SIZE=18 ><B>LAYOUT EDITOR </B></FONT></html>", JLabel.CENTER);
			heading.setBorder(BorderFactory.createEtchedBorder( Color.black , Color.white));

			topPanel.setLayout(new BorderLayout());
			topPanel.add(heading , BorderLayout.NORTH);
			topPanel.add(headButton , BorderLayout.SOUTH);

			java.net.URL imgURL = getClass().getResource("images/simulate1.png");
			java.net.URL imgURL2 = getClass().getResource("images/simulate1.png");
			if (imgURL != null && imgURL2 != null) 
			{
				icon_check =  new ImageIcon(imgURL);
				icon_fix_size =  new ImageIcon(imgURL2);
			}
			else 
			{
				System.err.println("Couldn't find file: " );
				icon_check =  null;
				icon_fix_size =  null;
			}

			check_button    = new JButton("  CHECK DRC RULES" , icon_check );
			fix_size_button = new JButton(" FREEZE  COMPONET SIZE " );
			check_button.setToolTipText("Check DRC Rules");
			fix_size_button.setToolTipText("Freeze The Component Size");
			
			icon_check.setImageObserver(check_button);
			//icon_fix_size.setImageObserver(fix_size_button);

			fix_size_button.addActionListener(this);
			check_button.addActionListener(this);
			
			headButton.add(fix_size_button );
			headButton.add(check_button );
			
			




		}
		// To change the icon at the selected part ..................
		public void magnify()
		{
			scale_x += 0.5;
			scale_y += 0.5;
		}
		public void unmagnify()
		{
			scale_x -= 0.5;
			scale_y -= 0.5;
		}
		

		public void change_selected (int no)
		{
			selected.setIcon(icon[no]);
		}
		public boolean check_overlapping_diff_metal()
		{
			int x1 , x2 , y1 , y2 ;
			int X1 , X2 , Y1 , Y2 ;
			int i , j , k , type1 = 1 , type2 = 1;
			
			int space = 0 ;
			for ( k = 1 ; k <= 7 ; k ++ )
			{
				// Different metal overlapping cases 
				switch ( k ){
					case 1 : type1 = 3 ; type2 = 6 ; space = 1 ; break ; // Contact and N Select 
					case 2 : type1 = 3 ; type2 = 7 ; space = 1 ; break ; // Contact and P Select 
					case 3 : type1 = 4 ; type2 = 5 ; space = 5 ; break ; // Active  and N Well 
					case 4 : type1 = 4 ; type2 = 6 ; space = 2 ; break ; // Active and  N Select 
					case 5 : type1 = 4 ; type2 = 7 ; space = 2 ; break ; // Active and  P Select 
					case 6 : type1 = 2 ; type2 = 6 ; space = 3 ; break ; // Poly and  N Select 
					case 7 : type1 = 2 ; type2 = 7 ; space = 3 ; break ; // Poly and  P Select 
					
				}
			
				for ( j = 0 ; j < comp_count[type1] ; j ++ )
				{
					X1 =  each_comp_node_array[type1][j].node_x;
					X2 =  each_comp_node_array[type1][j].node_x + each_comp_node_array[type1][j].width;
					Y1 =  each_comp_node_array[type1][j].node_y;
					Y2 =  each_comp_node_array[type1][j].node_y + each_comp_node_array[type1][j].height;
					
					for ( i = 0 ; i < comp_count[type2] ; i ++ )
					{
						x1 =  each_comp_node_array[type2][i].node_x;
						x2 =  each_comp_node_array[type2][i].node_x + each_comp_node_array[type2][i].width;
						y1 =  each_comp_node_array[type2][i].node_y;
						y2 =  each_comp_node_array[type2][i].node_y + each_comp_node_array[type2][i].height;

						// Overlaping of edges of one rect with the border of 2* space of other rect
						// Overlapping of Comp is allowed maintaing edge rules .
						if ( (x1 > X1 - space && x1 < X2 + space )|| ( x2 > X1 - space && x2 < X2 + space ))
						{
							if ( (y1 > Y1 - space && y1 < Y1 + space )|| ( y2 > Y1 - space && y2 < Y1 + space ) ||		            (y1 > Y2 - space && y1 < Y2 + space )|| ( y2 > Y2 - space && y2 < Y2 + space ))
							{
								JOptionPane.showMessageDialog(null, "   It voilates the DRC Rule :- \nSpacing between different components is NOT correct.");	
								return false ;
							}
						}
					}
				}
			}
			return true ;
		}
		public boolean  check_spacing_same_metal ()
		{
			String SpaceErrorReport = null ;
			int x1 , x2 , y1 , y2 ;
			int X1 , X2 , Y1 , Y2 ;
			int i , j , k ;
			
			int space = 0 ;


			for ( k = 1 ; k <= total_comp_type ; k ++ )
			{
				
				switch ( k ){
					case 1 :   space = 3*width ; break ;  // Metal1
					case 2 :   space = 2*width ; break ;  // Poly contact
					case 3 :   space = 2*width ; break ;  // Metal Contact
					case 4 :   space = 3*width ; break ;  // Active 
					case 5 :   space = 6*width ; break ;  // N Well 
					case 6 :   space = 2*width ; break ; // N Select 
					case 7 :   space = 2*width ; break ;  // P Select 

					default:   space = 0*width ; break ;
				}

				for ( j = 0 ; j < comp_count[k] ; j ++ )
				{
					X1 =  each_comp_node_array[k][j].node_x;
					X2 =  each_comp_node_array[k][j].node_x + each_comp_node_array[k][j].width;
					Y1 =  each_comp_node_array[k][j].node_y;
					Y2 =  each_comp_node_array[k][j].node_y + each_comp_node_array[k][j].height;
					
					for ( i = j+1 ; i < comp_count[k] ; i ++ )
					{
						x1 =  each_comp_node_array[k][i].node_x;
						x2 =  each_comp_node_array[k][i].node_x + each_comp_node_array[k][i].width;
						y1 =  each_comp_node_array[k][i].node_y;
						y2 =  each_comp_node_array[k][i].node_y + each_comp_node_array[k][i].height;

						if (( (x1 > X1 - space && x1 < X2 + space )|| ( x2 > X1 - space && x2 < X2 + space )) && 
						    ( (y1 > Y1 - space && y1 < Y2 + space )|| ( y2 > Y1 - space && y2 < Y2 + space )) )
						{
							JOptionPane.showMessageDialog(null, "   It voilates the DRC Rule :- \nSpacing between same components is NOT correct.");	
							return false ;
						}
/*						
						// Overlaping of edges of one rect with the border of 2* space of other rect
						if ( (x1 > X1 - space && x1 < X2 + space )|| ( x2 > X1 - space && x2 < X2 + space ))
						{
							if ( (y1 > Y1 - space && y1 < Y1 + space )|| ( y2 > Y1 - space && y2 < Y1 + space ) ||		            (y1 > Y2 - space && y1 < Y2 + space )|| ( y2 > Y2 - space && y2 < Y2 + space ))
							{
								JOptionPane.showMessageDialog(null, "   It voilates the DRC Rule :- \nSpacing between same components is NOT correct.");	
								return false ;
							}
						}		*/
					}	
				}
			}
			return true ;
		}
		public boolean  check_comp_size(int comp_no)
		{

			boolean value_return = false ;
			switch(comp_no){
			
				case 1 :   if (  current_comp_width >= 3 &&  current_comp_height >= 3 )  // Metal1
					 	value_return =  true ;
					   else 
						value_return =  false ;
				break ;


				case 2 :   if (  current_comp_width >= 2 &&  current_comp_height >= 2 )  //Poly
					 	value_return =  true ;
					   else 
						value_return =  false ;
				break ;


				case 3 :   if (  current_comp_width >= 2 &&  current_comp_height >= 2 )  // Contact
					 	value_return =  true ;
					   else 
						value_return =  false ;
				break ;


				case 4 :   if (  current_comp_width >= 3 &&  current_comp_height >= 3 ) // Active 
					 	value_return =  true ;
					   else 
						value_return =  false ;
				break ;


				case 5 :   if (  current_comp_width >= 10 &&  current_comp_height >= 10 ) // NWell
					 	value_return =  true ;
					   else 
						value_return =  false ;
				break ;


				case 6 :   if (  current_comp_width >= 2 &&  current_comp_height >= 2 ) // NSelect 
					 	value_return =  true ;
					   else 
						value_return =  false ;
				break ;


				case 7 :   if (  current_comp_width >= 2 &&  current_comp_height >= 2 ) // P Select
					 	value_return =  true ;
					   else 
						value_return =  false ;
				break ;
		
				default : 
 					value_return = true ;
				break ;
			}
			return value_return ;
		}
		public void actionPerformed(ActionEvent e )
		{
	
			if(e.getSource() == fix_size_button )
			{
				
				if ( check_comp_size(img_button_pressed) )//comp property is satisfied 
				{
					change_selected(0);
					comp_pick_mode = 0 ;
					img_button_pressed = -1 ;
					
					current_comp_width = -1;
					current_comp_height = -1 ;
					
				/*	System.out.println("FIX SIZE\n");
					int count = 0 , i , j , k ;
					for ( i = 0 ;i < 10 ; i ++ )
						for ( j = 0 ; j < 400 ; j ++ )
							for ( k =0 ; k < 400 ; k ++ )
								if ( work_mat_array[i][j][k] != -1 )
									count++;
					System.out.println(count);
				*/
				}
				else
				{
					if (img_button_pressed == -1 )
					{	
						JOptionPane.showMessageDialog(null, "Select any component first.");
					}
					else
					{
						JOptionPane.showMessageDialog(null, "It voilates the DRC Rules !!");
					}
				}
			}
		
			else if(e.getSource() == check_button )
			{
				if ( check_spacing_same_metal() && check_overlapping_diff_metal() )
				{
					JOptionPane.showMessageDialog(null, "Layout Design satisfies DRC Rules !!");
				}
				
			}
			else if ( comp_pick_mode == 0 )  // Selecting New Comp After Fixing the size of last comp 
			{

				if (e.getSource() == img_button1[1] )
				{
						img_button_pressed = 1 ;	
						change_selected(1);
						comp_pick_mode = 1;
					//	System.out.println("img_button1[1] clicked");
				}
				else if (e.getSource() == img_button1[2] )
				{
					img_button_pressed = 2 ;	
					change_selected(2);
					comp_pick_mode = 1;
					//	System.out.println("img_button1[2] clicked");
				}
				else if (e.getSource() == img_button1[3] ) // Wire :)
				{
					img_button_pressed = 3 ;	
					change_selected(3);
					comp_pick_mode = 1;
				}
				else if (e.getSource() == img_button1[4] ) // Input 
				{	System.out.println("img_button1[4] , 4 clicked");
					img_button_pressed = 4 ;	
					change_selected(4);
					comp_pick_mode = 1;
				}
// 				else if (e.getSource() == img_button1[5] )
// 				{	System.out.println("img_button1[5] , 5 clicked");
// 					img_button_pressed = 5 ;	
// 					change_selected(5);
// 					comp_pick_mode = 1;
// 				}
				else if (e.getSource() == img_button2[0] )
				{	System.out.println("img_button2[0] , 6 clicked");
					img_button_pressed = 5 ;	
					change_selected(5);
					comp_pick_mode = 1;
				}
				else if (e.getSource() == img_button2[1] )
				{
					img_button_pressed = 6 ;	
					change_selected(6);
					comp_pick_mode = 1;
				}
				else if (e.getSource() == img_button2[2] )
				{
					img_button_pressed = 7 ;	
					change_selected(7);
					comp_pick_mode = 1;
				}
				else if (e.getSource() == img_button2[3] )
				{
					img_button_pressed = 8 ;	
					change_selected(8);
					comp_pick_mode = 1;
				}/*
				else if (e.getSource() == img_button2[4]  )
				{
					img_button_pressed = 10 ;	
					change_selected(10);
					comp_pick_mode = 1;
				}*/
			}
			else //Selecting New Comp  Before Fixing the size of last comp
			{
				JOptionPane.showMessageDialog(null, "Please First Fix the Selected Component Size !!");
			}

		}
		public void mouseMoved(MouseEvent me) { } 
		public void mouseDragged(MouseEvent e) {}

	}// MyPanel class extends JPanel Class Ends here

	
}

