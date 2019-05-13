`timescale 1ns/1ns
module mux2_tb;
	wire q;
	reg d1,d0,s;
	mux2 mux2(s, d1, d0, q );
	initial
		begin
	
   #3 d1=1'b0; d0=1'b1; s=1'b0;   #5 d1=1'b0;d0=1'b0; s=1'b1; #3 d1=1'b0; d0=1'b1; s=1'b1;   #5 d1=1'b0;d0=1'b0; s=1'b0;
					
		end

always @( s or d1 or d0)
#1 $display("t=%t",$time," s=%b",s," q=%b",q," d=%b%b",d1,d0);
endmodule