<!-- templates/users.xsl -->
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:template match="users">
        <html>
            <body>
                <h2>Registered Users</h2>
                <table border="1">
                    <tr bgcolor="#9acd32">
                        <th>name</th>
                    </tr>
                    <xsl:for-each select="user">
                        <tr>
                            <td><xsl:value-of select="name"/></td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
