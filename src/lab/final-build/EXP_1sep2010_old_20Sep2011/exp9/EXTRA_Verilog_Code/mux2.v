`timescale 1ns/1ns
module mux2( s, d1, d0, q );

input s,d0,d1;
output q;

reg q;

always @( s or d1 or d0)
begin
    q = ( ~s & d0 ) | (  s & d1 );
end

endmodule