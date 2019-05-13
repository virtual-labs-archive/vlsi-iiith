*Pass Transistor 
.include '45nm_HP.pm'
M1 In clk1 out Vdd PMOS l=50n w=100n
M2 In clk out 0 NMOS l=50n w=100n
Vdd Vdd 0 1.1
VIn In 0 pulse (0   1  0 1n 1n 10n 20n  )
Vclk clk 0 pulse (0  1  0 1n 1n 10n 20n  )
Vclk1 clk1 0 pulse (1   0  0 1n 1n 10n 20n  )
.tran 1n 100n
.save V(out) V(In) V(clk) V(clk1) 
.end
