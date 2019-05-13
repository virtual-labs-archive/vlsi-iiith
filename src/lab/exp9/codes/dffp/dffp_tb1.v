`include "dffp.v"
`timescale 1ns/1ns
module dffp1_tb;
	wire q;
	reg d,clk;
	dffp dffp(q, clk, d );
	initial
		begin
	 $monitor(q, d, clk);
      #0 d=1'b1;clk=1'b1;
	#5 d=1'b0;clk=1'b0;
	#5 d=1'b0;clk=1'b1;
	#5 d=1'b0;clk=1'b0;
	#5 d=1'b1;clk=1'b1;
	#5 d=1'b1;clk=1'b0;

	#5 d=1'b0;clk=1'b0;
	#5 d=1'b0;clk=1'b1;
	#5 d=1'b0;clk=1'b0;
	#5 d=1'b1;clk=1'b1;
	#5 d=1'b1;clk=1'b0;
	end
	always @( d or clk)
#1 $display("t=%t",$time," d=%b",d," clk=%b",clk);

initial  begin
    $dumpfile ("dffp1.vcd"); 
    $dumpvars;
end
endmodule
 
