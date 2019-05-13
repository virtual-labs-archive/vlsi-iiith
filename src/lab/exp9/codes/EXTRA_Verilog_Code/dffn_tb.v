`timescale 1ns/1ns
module dffn_tb;
	wire q;
	reg d,clk,r;
	dffn dffn(q, clk, d,r );
	initial
		begin
	 $monitor(q, d, clk, r,);
//   #3 d=1'b0; clk=1'b0;   #5 d=1'b0; clk=1'b1; #3 d=1'b0; clk=1'b1;   #5 d=1'b0; clk=1'b0;
	//  #3 d=1'b0; #2 d=1'b1; #3 d=1'b0; #2 d=1'b1;#2 clk=1'b0; #2 clk=1'b1;#2 clk=1'b0;#2 clk=1'b1;
   #0 d=1'b1;clk=1'b1;r=1'b1;
	#5 d=1'b1;clk=1'b0;r=1'b1;
	#5 d=1'b0;clk=1'b1;r=1'b1;
	#5 d=1'b0;clk=1'b0;r=1'b1;
	#5 d=1'b1;clk=1'b1;r=1'b1;
	#5 d=1'b1;clk=1'b0;r=1'b1;
	//#3 d=1'b1;#3 d=1'b0;#3 d=1'b1;#3 d=1'b0;#3 d=1'b1;#3 d=1'b0;
	//#2 clk=1'b1;#2 clk=1'b0;#2 clk=1'b1;#2 clk=1'b0;#2 clk=1'b1;
	//#5 r=1'b1;#5 r=1'b0;#5 r=1'b1;#5 r=1'b0;#5 r=1'b1;
	end
	always @( d or clk or r)
#1 $display("t=%t",$time," d=%b",d," clk=%b",clk," r=%b",r);
endmodule
 