fields:
  - id: username
    type: string
    label: Username
  - id: password
    type: string
    label: Password
    secret: true
 

extra_vars:
  rhpdspass: '{{password}}'
  rhpdsurl: '{{url}}'
  rhpdsuser: '{{username}}'
<B>Create Custom Creds - RHPDS  </B>

INPUT CONFIGURATION:
<pre class="line-number language-yaml"><code>fields:
  - id: username
    type: string
    label: Username
  - id: password
    type: string
    label: Password
    secret: true
   - id: url
    type: string
    label: rhpdsurl
</code></pre>
INJECTOR CONFIGURATION:
<pre class="line-number language-yaml"><code>
extra_vars:
  rhpdspass: '{{password}}'
  rhpdsurl: '{{url}}'
  rhpdsuser: '{{username}}'
</code></pre>
