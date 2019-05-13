`timescale 1ns/1ns
module mux2( clk, In1, In2, Out );

input clk,In1,In2;
output Out;

reg Out;

always @( clk or In2 or In1)
begin
    Out = ( ~clk & In1 ) | (  clk & In2 );
end

endmodule