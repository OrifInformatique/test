# Ceci est un essai pour comprendre comment Github fonctionne

# Lignes de code de test

a = 77
b = 99

c = a - 22  #55
d = c - 22  #33
e = d - 22  #11
f = e - 22  #-11
g = int(d/f)#-3
h = int(c/f)#-5

somme = a + b + c + d + e + f + g + h

control = 77+99+55+33+11-11-8

print(f"""
Affichage du calcul effectué :

    {a} + {b} + {c} + {d} + {e} + {f} + {g} + {h}=
    
    ---
    {somme}
    ---

Le résulat attendu :

    ---
    {control}
    ---
""")