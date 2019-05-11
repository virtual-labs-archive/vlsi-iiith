#!/bin/bash
for i in {1..9}
do
rsync -azv /home/cse0$i/public_html/final-build/* virtual-labs.ac.in/var/www/labs/cse0$i/
done

for i in {10..29}
do
rsync -azv /home/cse$i/public_html/final-build/* virtual-labs.ac.in/var/www/labs/cse$i/
done
