*NAND
.include '45nm_HP.pm'
M1 out b Vdd Vdd PMOS l=50n w=100n
M2 out a vdd vdd PMOS l=50n w=100n
M3 N b out 0 NMOS l=50n w=100n
M4 0 a N 0 NMOS l=50n w=100n
cl out 0 f
Vdd Vdd 0 1.1
Va a 0 pulse ( 0 1.1 0 1n 1n 5n 10n )
Vb b 0 pulse (0 1.1 0 1n 1n 10n 20n )
.tran 1n 100n
.save V(out) V(a) V(b)
.end
