*XNOR
.include '45nm_HP.pm'
M1 n a Vdd Vdd PMOS l=50n w=100n
M2 n b Vdd Vdd PMOS l=50n w=100n
M3 out a1 n Vdd PMOS l=50n w=100n
M4 out b1 n vdd PMOS l=50n w=100n
M5 out a p 0 NMOS l=50n w=100n
M6 out a1 q 0 NMOS l=50n w=100n
M7 p b 0 0 NMOS l=50n w=100n
M8 q b1 0 0 NMOS l=50n w=100n
cl out 0 103f
Vdd Vdd 0 1.1
Va a 0 pulse ( 0  1.1  0 1n 1n 5n 10n  )
Vb b 0 pulse ( 0  1.1 0 1n 1n 5n 10n  )
Va1 a1 0 pulse (1.1   0 0 1n 1n 5n 10n  )
Vb1 b1 0 pulse (1.1   0 0 1n 1n 5n 10n  )
.tran 1n 100n
.save V(out) V(a) V(b) V(a1) V(b1)
.end
