PGDMP  	                    |            agencia_carros_b    16.1    16.1                0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    19225    agencia_carros_b    DATABASE     �   CREATE DATABASE agencia_carros_b WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Portuguese_Brazil.1252';
     DROP DATABASE agencia_carros_b;
                postgres    false            �          0    19226    agencia 
   TABLE DATA           I   COPY public.agencia (num_agencia, endereco, contato, cidade) FROM stdin;
    public          postgres    false    215   �       �          0    19245    carros 
   TABLE DATA           }   COPY public.carros (marca, modelo, ano, placa, status, id_carro, cor, valor_carro, disponibilidade, num_agencia) FROM stdin;
    public          postgres    false    219   p       �          0    19235    clientes 
   TABLE DATA           h   COPY public.clientes (telefone, nome, cnh, id_cliente, cidade, estado, sobrenome, endereco) FROM stdin;
    public          postgres    false    217   8       	          0    19300    aluga 
   TABLE DATA           e   COPY public.aluga (data_fim, data_inicio, id_aluguel, valor_total, id_carro, id_cliente) FROM stdin;
    public          postgres    false    229   �%                 0    19291    feedback 
   TABLE DATA           P   COPY public.feedback (id_feedback, comentario, avaliacao, id_carro) FROM stdin;
    public          postgres    false    227   �&                 0    19546    forma_pagamento 
   TABLE DATA           p   COPY public.forma_pagamento (id_forma_pagamento, forma_pagamento, nome_titular, numero_cartao, cnh) FROM stdin;
    public          postgres    false    232   e(                 0    19254    funcionarios 
   TABLE DATA           }   COPY public.funcionarios (id_funcionario, nome_funcionario, cargo_funcionario, salario_funcionario, num_agencia) FROM stdin;
    public          postgres    false    221   e)                 0    19277 
   manutencao 
   TABLE DATA           u   COPY public.manutencao (id_manutencao, data_manutencao, tipo_manutencao, descricao, km, custo, id_carro) FROM stdin;
    public          postgres    false    225   J*                 0    19268 	   pagamento 
   TABLE DATA           �   COPY public.pagamento (id_pagamento, valor, status_pagamento, data_pagamento, id_registro, comprovante, forma_pagament) FROM stdin;
    public          postgres    false    223   �+       
          0    19316    registra 
   TABLE DATA           ;   COPY public.registra (id_cliente, id_feedback) FROM stdin;
    public          postgres    false    230   [,                 0    19572    reservas 
   TABLE DATA           r   COPY public.reservas (id_reserva, data_reserva, data_devolucao, id_carro, id_cliente, status_reserva) FROM stdin;
    public          postgres    false    234   �,                  0    0    aluga_id_aluguel_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.aluga_id_aluguel_seq', 6, true);
          public          postgres    false    228                       0    0    carros_id_carro_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.carros_id_carro_seq', 30, true);
          public          postgres    false    218                       0    0    clientes_id_cliente_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.clientes_id_cliente_seq', 10, true);
          public          postgres    false    216                       0    0    feedback_id_feedback_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.feedback_id_feedback_seq', 1, false);
          public          postgres    false    226                       0    0 &   forma_pagamento_id_forma_pagamento_seq    SEQUENCE SET     U   SELECT pg_catalog.setval('public.forma_pagamento_id_forma_pagamento_seq', 1, false);
          public          postgres    false    231                       0    0    funcionarios_id_funcionario_seq    SEQUENCE SET     N   SELECT pg_catalog.setval('public.funcionarios_id_funcionario_seq', 1, false);
          public          postgres    false    220                       0    0    manutencao_id_manutencao_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.manutencao_id_manutencao_seq', 1, false);
          public          postgres    false    224                       0    0    pagamento_id_pagamento_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.pagamento_id_pagamento_seq', 1, false);
          public          postgres    false    222                       0    0    reservas_id_reserva_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.reservas_id_reserva_seq', 5, true);
          public          postgres    false    233            �   x  x�eT�n�0�ů`� KC��r�@pb�#E���Њ6%���$U�T����2C�������d�}��w�U�ia�e��;)�s��X$i���O�G,S�������������+ډp'��Dđ��NW��μٺ�,�0۶�ԭ9 P�.Eq��,/�`o,=�	jm�e�_*���S���Z���W �H�r/�$�ݱ�I
J
*֊R����i�S��qyey�`��I��?L�>T�id��l��d��Q\wδ�X�_��m��B���$ ��W����(���J�X1 XT\�J�/h>�y�H�U�;�Z˷�>:�d8���R��3�p�B�]�� ��-��5LJ�t�q���pJ)���Ej�n�Xu���bJj$�k[7��N����3�p[M�-����G܁#�K��h;��P#�K��F7�`X0_dT���g����q�4�3�1���f2c� J~�u$��X`���\�f�k�ґ�$��AP�C�d���E�"��Ӷ�La�ΒQ3��y�<���,u~��`]�~��T�f.�.7���{��ߥ&�sӖ�����}Ƭ��Uі��^�x~����L	�'A�Yڦ�����9�ZF,�gK�T:����V[
yV�oW��4e      �   �  x��X�v�:|_�h7���q�[l�q����T�ԅ�'�ן� �p�c�ٳgfoe'>D�Hd"IbDlb��M��㢛�a��~A=۶��6��m׫�l?�#l݉���~��8D���P�G��v����,F˧�x�Vp��v�6bE����re�'+�`�~����D�=��X�K��p �( G�$N�,���=9�������HP`Ĳ��s��-��x���n	j#��vb�72�ai\$9�$K�em�E�ɴb��U,�N�&ǚ�$H��,��0_�%�.����Db�,��Cl.;8���vŷ�%E�3p�Z�ى��ް�E����ü���!JR�7��Y{�����m� ���2�ӣ@�)����"��a\C��W�\�x%�5�C�Y���<���+a���U��
T�11�ҶF�t����n��JKUQT�����i:��`k����l�hʋ�+��t*V:��J:�5��XS��3?�i`K{���+�J ���Ş�E��	Mı8Kr狥�\���$��ᔽ���_��Rt��<���u�R�����w���P%�2��Z��Q$��s�XkV�2�#Ǧu�UJU=��ݚ����~���~�2Y�r��3��#��;�Zğ�������BT��#[��G�h��;c����Ӿ�j��Ra�C�Qq�h�H�=^�ٚ�~�v�Sa!N,��H��U�]Gx�^%��[|k��A3�-ę�^�����tO�u���[�'��Ԋ�rS��J.[��:'oǓ�(�Uj���8=�LȶC4V��w�&U<��Tr/�.Y�����d�u���nh*�	�HS�����Ќ�U�ߥ \���{�Rc=e <�Ҍ��j��������c��C�p>4��9�>N��1����BZ��I,΅Ҷ�?/��<m��nÅ��t]��;�F�-��x����*$ԕr<��l�K���T��z`*�������&�]�+{M9�A�&�E��XFDൢ�t]Pl��rj�e6h|I��'Jh/q������$���K/��G�Ȥ�0��S��Zm��t1���s�ʶ�"ˡC��d2P�o_ݼ�o�s���4t�*���)��({u��%�D�����^|��|�����u��\C���zgh0Ջvר䶉�WIG��ܣ��ۋ��rTy[A��D�^&\�|���4r<� �&V_�ö�+���RBJT�w��5�&0Uic�������H�@9������Fh�P�W}�\��?@k�:�z-�{�%n�O�A�W�hg�A۰�+U��x��&B����;��eT�C����/�n/�j�� h��R�ޚ&������8�{����`C�:�M|�;Un�`�=7�^D��B�4�4Cx(��t�-8l�m����@ڥ�/J����Rk㣨fF�A��<T����Vb�g�m���0U+l�AA��|�|ݷ��P���G�o�e�����      �   @  x�m��r��E׉��� f`	�n=4)k�6E�Z�%cP8�od/Z���o�c�fR��j�D�V�ɛ	��� �(����A�I��G��/��E_iڮi��A�^��h݋J7�u�(���=��4>NY��Q���Q�-�{%j�M�+����/(��*��w��gݩB8Y��I���%>ou@t"+����]ם��Kڊ����g-�=Gn{�8N��d�@��;U�A4��������g�S�T�"+�(��`�i��ߡ�N8i�e㱮�@���XP�NP·(m����� 
ds��R��{Q�DFL򉘵<�8iD]�19���	�E^%*}'�T�더���{�Q�)y��ԭ)5! ��O�'r�����9�Ϣ;���_Z��� ��� 	=�V��\�\Ju��m�<oa�/D�ۋ��iߨN��7t#�R.����Z( ��ԯ,3�H�B8Z��n^��F�fK�j���mU�:.ŮQ�b��E^ b�@�n�$���t��ӵ@}�Y���AM���E^HP#*����#�;��Yqq
':�s��ģf���p�Z�-�7��1����[5�A����y1� _��g�i{J�R�q��q{&�.d��%��aB�p���*i}�������A�oŋ|D��y҃8�U0=6J"K)�
$�6��7b���>�s+���&;s��5`6"@�e����'���F�vL�ɑ{�Cw��<�b��8��_�
��wl%/�zZ��a�I�C���/��C#=�ذ7���~��@l$�d|��!,����	��؀c�����I�?:���T7�Cpq�D���2�|s�)\��Q�122b�	�|x��:���j-�7�-P?�.^�QB��mm�Vi�5ԍ���+$'S���ӕW��lV�����>�s��[��2]��|:/{c}�𔙄�	�0y:� d��^�Hl���X���XYOΊI-��~�J\�O�
�r�~��d�6�3��ֆ��r�q:݈���m���_+z�k��X�ؘ��QMLHڀ!�כ� KD�od'�������~2nӠ�##��wN����� �����P,�Ş��o6��u�4�]�F��j�I�5<c��M"��*��h/��1����L9?�0��n;�������9�}����Z�yc0��<�Wۖ\� Bo+�^������� ���
��A4�&��(��JX����p^4�«�/���$m#Ծ�K�;�� !�"�Fa��ì)��81��uxZ�K�1@4�'�1̉R6�B|�i{ax;�|�//X��(��lX���b���26����Neam��ʟ���Z�1/`�[�4��ݸELZ��˳f��IvkUXC@�xFu���V��ϥ�1l�n��q��[�4����� h���Fd:�5�?XV�J=.圑0��G#;�݊�P{�~3��M��3�g��N7Sf�5a�[�h^���Iؙ޻�c�`��3���g4%\t��&Ee�"�z>?-�E�=��X�?�g��Eg �&0��L}ӛ�����f����T%�L�}��L'��2o��\v����q?�5�BnR�8��d�yI����Zs�}Ԙ������V�@0����<Ъ�xL�3�+'f�������7'X3��b�C_`W��L��c^}�G���H����f�߯)E�����2������N�z�}���I�E�q�s���cr����y�������|ؿ�gL�3%J�7'�0�~���N�w��0�a��XB,:�dX�A�xVƃM������Q0�|2�6;���L��윱95<O�?L��������?�ށb      	   W  x�U�ۑ� ��\v=0����4�?��t1X�����El��|K������>����%d4A��}C�$D�!~oCBN�U<6Ԥn���Pz��u��tm�k�Ά4BU^Ҟ鰍�����t�2��la��SbN���w�6֙p���Yb���d�1'bU^be�a�3� V���m3)�����6�� ��	&]b�z�eұ���a"V埘I;���Gmc��:I���ĞB���c�6��m^l�U�)1��VY������B�e�ÊH,�Y��7��X��e�CӚ�Ѧ��S��t#F�L:x{��7�z�k�
����{]�"��         f  x�M�Mj�0���)� �������t��Ě$,��'�^�'(]
ݵ'��:r�b����S�����A�޻	��Q��ǉ  ��_˵+�B�K]��<d�#�#��%��W�Ga�5� :#��й�:b��Ae�g�O��S��nې�,�@`��6��ؤ}��P3U��|$��n�t�"Ts@0����,[��mGoX��*7z���55��P�R�<�����'�~q(�@!��WS�wg�ާ��8�}�mqI��e��+��B$s<g$E<�4��[Uz���Qv��%�E�#�BU�����q�Y4C:J=��✩t��3Í�.�w�����$�-ʆ{!4�Zh��'���         �   x�m�1n�0@gs��
��H	��ڂH�Y~�KƖ����(�X��lY�|����d�?IcN�ܐ��GV����� �ک;���߯����	-J��ȜP2^�e��j�Nh7�F #��[(��5Bx7mӈ?p��[�EyeR�pV@s)��8�W�(;^��p~c��P�}a���J�}*(�%~kݺ!	15���C������I��C���$��~�/e^ݢR��)˲��_         �   x�U�=��0F��)|��I��2B"�*hiif�)F2�j�Pp�=��,��<�oRؠt~�ߖ�ĂP���1&1R����-�#B��$#9���/�]��[R̟D�f��(�W~��������Aoo���u����C���j_�et�+{ �'�e�
��G��^��dUQ�����j�x���"����r����G�,��V(uÇIP�}�����i         0  x���MN�0�מS���ۦK��d3M�Ԓ�+;�X �!�N�4�"!Er����g�$����=�P?����[�:��G���h�|d�pΙ�|�р,��=�h�_�C�0��k��Y��0����Df-mf-)@-����g�~�);9�þ�����G^�H	�h�Z��,y�|e�o?`�9I��W`n��g�ؘ��S@�Լ�Lö`"��w�
�Y�|`z^�+
vK����%��%��[rs/y���!�NLS��K��~hr��l���[uA� �R�����s����� �(�c         �   x�}�;nQ��z/3��}k�)B�&B(R$���U�1У�ͣ�ѵ}�Gf���j��]�[(k8*�������2�� ���Ai`�z�)�t��aYCF���e�BC�",�QD�(6)�j�&E�(5�(��>�y=͟�+��=ɍd*on(��
Uwr��zR�$��[
�Z~v��5��ŋ�      
   /   x��I   �����(��:H���'�Ų(7���r� ������         �   x�U��
1��黬4���| /�[A�
��cV�InLf�)E Oq�i"/�  ,�~�>��:Qa��������� �B>�tZQ0p�������%��y��t\6�@Q�""	���*Rdo�#f� ���^W�#��]�h:�p�W�Rɔgl����`Z�C~�F�j���	L�����,^�ι7����     