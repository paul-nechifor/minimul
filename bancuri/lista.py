#!/usr/bin/env python2

import time

bancuri = open("/home/p/fis/pro/recl/bancuri/lista").read().split("-" * 120 + "\n")[:-1]

for banc in bancuri:
    t = banc.split("\n")

    textul = t[:-3]
    textul = "\\n".join(textul).replace("'", "")
    restul = t[-2].split(",")

    sus = int(restul[1])
    jos = int(restul[2])
    scor = sus - jos
    categorie = restul[0]
    data = time.strftime("%s", time.strptime(restul[3], "%Y-%m-%d %H:%M:%S"))

    print "insert into bancuri (scor, sus, jos, data, categorie, textul) values (%d, %d, %d, %s, '%s', '%s');" % (scor, sus, jos, data, categorie, textul)

