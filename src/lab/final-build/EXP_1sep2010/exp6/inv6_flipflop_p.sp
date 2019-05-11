*Positive Edge Trigger Flip Flop 
.include '45nm_HP.pm'
MNMOS_1 D Clk1 N_2 Gnd NMOS l=50n w=100n  

MNMOS_2 N_4 Clk N_2 Gnd NMOS l=50n w=100n  

MNMOS_3 N_1 N_2 Gnd Gnd NMOS l=50n w=100n 

MNMOS_4 N_4 N_1 Gnd Gnd NMOS l=50n w=100n  

cl N_4 0 100f

MNMOS_5 Q N_6 Gnd Gnd NMOS l=50n w=100n 

MNMOS_6 Q1 Q Gnd Gnd NMOS l=50n w=100n 

MNMOS_7 Q1 Clk1 N_6 Gnd NMOS l=50n w=100n  

MNMOS_8 N_1 Clk N_6 Gnd NMOS l=50n w=100n 

c2 N_1 0 100f 

MPMOS_1 D Clk N_2 Vdd PMOS l=50n w=450n  

MPMOS_2 N_4 Clk1 N_2 Vdd PMOS l=50n w=450n  

MPMOS_3 N_1 N_2 Vdd Vdd PMOS l=50n w=450n  

MPMOS_4 N_4 N_1 Vdd Vdd PMOS l=50n w=450n

c3 q 0 100f  

MPMOS_5 Q1 Q Vdd Vdd PMOS l=50n w=450n  

MPMOS_6 Q N_6 Vdd Vdd PMOS l=50n w=450n  

MPMOS_7 Q1 Clk N_6 Vdd PMOS l=50n w=450n  

MPMOS_8 N_1 Clk1 N_6 Vdd PMOS l=50n w=450n

c4 q1 0 100f  

VVdd Vdd Gnd  DC 1.1 
VN_1 0 pulse (0   1  0 1n 1n 10n 12n  )
Vclk1 clk1 0 pulse (1  0  0 1n 1n 5n 10n  )
Vclk  clk  0 pulse (0  1  0 1n 1n 5n 10n  )
.tran 1n 100n
.save V(Q) V(VN_1) V(clk)
.end
