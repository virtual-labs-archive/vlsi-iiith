*pass transistor

.include '45nm_HP.pm'

M1 In clk out Vdd PMOS l=50n w= 450n

M2 In clk1 out 0 NMOS l=50n w=100n

Vdd Vdd 0 1.1

VIn In 0 pulse (0 1.1 0 1n 1n 5n 10n)

Vclk clk 0 pulse (0 1.1 0 1n 1n 10n 20n)

Vclk1 clk1 0 pulse (1.1 0 0 1n 1n 10n 20n)

.tran 1n 100n

.save V(In) V(clk) V(clk1) 

.save V(out)

	.end
