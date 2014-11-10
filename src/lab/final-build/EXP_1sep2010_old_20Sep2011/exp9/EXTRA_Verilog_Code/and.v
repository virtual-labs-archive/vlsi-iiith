/* A simple AND gate 
File: and.v              */

module andgate (a, b, y);
input a, b;
output y;

assign y = a & b;

endmodule