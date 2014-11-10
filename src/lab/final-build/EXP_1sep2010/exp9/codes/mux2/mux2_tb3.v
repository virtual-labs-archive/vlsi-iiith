`timescale 1ns/1ns
`include "mux2.v"
module mux2_tb3;
	wire Out;
	reg In1,In2,clk;
	mux2 mux2(clk, In1, In2, Out );
	initial
		begin
	
   #3 In2=1'b0;In1=1'b0; clk=1'b0;
   #5 In2=1'b1;In1=1'b1; clk=1'b0;
   #3 In2=1'b0;In1=1'b1; clk=1'b1;
   #5 In2=1'b1;In1=1'b0; clk=1'b0;

   #3 In2=1'b0;In1=1'b0; clk=1'b0;
   #5 In2=1'b1;In1=1'b1; clk=1'b1;
   #3 In2=1'b1;In1=1'b1; clk=1'b1;
   #5 In2=1'b0;In1=1'b0; clk=1'b1;
  
   #3 In2=1'b0;In1=1'b0; clk=1'b0;
   #5 In2=1'b1;In1=1'b1; clk=1'b0;
   #3 In2=1'b0;In1=1'b1; clk=1'b1;
   #5 In2=1'b1;In1=1'b0; clk=1'b0;
					
		end

always @( clk or In1 or In2)
#1 $display("t=%t",$time," clk=%b",clk," Out=%b",Out," In=%b%b",In2,In1);

initial  begin
    $dumpfile ("mux2_3.vcd"); 
    $dumpvars;
end
endmodule